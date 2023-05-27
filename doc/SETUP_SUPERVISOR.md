## Installing Supervisor on AWS EC2 manually.
-----------------

* Check **python with easy_install** is installed
* Install **supervisor** > `$ easy_install supervisor`
* Create directory for supervisor workers > `mkdir /etc/supervisor/conf.d/`
* Create laravel worker file > `touch /etc/supervisor/conf.d/laravel-worker.conf`
* Add following contents to `laravel-worker.conf`

```shell
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /opt/bitnami/apache2/htdocs/abb/current/artisan queue:work database --queue=high,default --tries=10 --delay=900
autostart=true
autorestart=true
user=root
numprocs=8
redirect_stderr=true
stdout_logfile=/opt/bitnami/apache2/htdocs/abb/current/storage/logs/worker.log
```

* in case u wanna use Queue Redis, then:
* Create laravel worker file > `touch /etc/supervisor/conf.d/laravel-horizon.conf`
* Add following contents to `laravel-horizon.conf`

```shell
[program:laravel-horizon]
process_name=%(program_name)s_%(process_num)02d
command=php /opt/bitnami/apache2/htdocs/abb/current/artisan horizon
autostart=true
autorestart=true
user=bitnami
redirect_stderr=true
stdout_logfile=/opt/bitnami/apache2/htdocs/abb/current/storage/logs/horizon.log
```

* Change `command` and `stdout_logfile` according to project setup
* Create **supervisor config** file > `touch /etc/supervisord.conf` and following contents to created file

```shell
; supervisor config file

[unix_http_server]
file=/var/run/supervisor.sock   ; (the path to the socket file)
chmod=0700                       ; sockef file mode (default 0700)

[supervisord]
logfile=/var/log/supervisor/supervisord.log ; (main log file;default $CWD/supervisord.log)
pidfile=/var/run/supervisord.pid ; (supervisord pidfile;default supervisord.pid)
childlogdir=/var/log/supervisor            ; ('AUTO' child log dir, default $TEMP)

; the below section must remain in the config file for RPC
; (supervisorctl/web interface) to work, additional interfaces may be
; added by defining them in separate rpcinterface: sections
[rpcinterface:supervisor]
supervisor.rpcinterface_factory = supervisor.rpcinterface:make_main_rpcinterface

[supervisorctl]
serverurl=unix:///var/run/supervisor.sock ; use a unix:// URL  for a unix socket

; The [include] section can just contain the "files" setting.  This
; setting can list multiple files (separated by whitespace or
; newlines).  It can also contain wildcards.  The filenames are
; interpreted as relative to this file.  Included files *cannot*
; include files themselves.

[include]
files = /etc/supervisor/conf.d/*.conf
; Change according to your configurations

```
* Create **log file for supervisor** as > `touch /var/log/supervisor/supervisord.log` if not exist
* **Restart** the supervisord as > `/usr/local/bin/supervisord -c /etc/supervisord.conf`
* **Reread** supervisorctl as > `/usr/local/bin/supervisorctl reread`
* **Update** supervisorctl as > `/usr/local/bin/supervisorctl update` 

#### **Add supervisor to chkconfig to get started automatically on system reboot**
create a file under /etc/init.d/ named *supervisord*
```shell 
touch /etc/init.d/supervisord
```
- add this as its content

```shell
#!/bin/bash
#
# supervisord   Startup script for the Supervisor process control system
#
# Author:       Mike McGrath <mmcgrath@redhat.com> (based off yumupdatesd)
#               Jason Koppe <jkoppe@indeed.com> adjusted to read sysconfig,
#                   use supervisord tools to start/stop, conditionally wait
#                   for child processes to shutdown, and startup later
#               Erwan Queffelec <erwan.queffelec@gmail.com>
#                   make script LSB-compliant
#               Greg Smethells <gsmethells@mgmail.com>
#.                  Allow supervisorctl to be overridden
#
# chkconfig:    345 83 04
# description: Supervisor is a client/server system that allows \
#   its users to monitor and control a number of processes on \
#   UNIX-like operating systems.
# processname: supervisord
# config: /etc/supervisord.conf
# config: /etc/sysconfig/supervisord
# pidfile: /var/run/supervisord.pid
#
### BEGIN INIT INFO
# Provides: supervisord
# Required-Start: $all
# Required-Stop: $all
# Short-Description: start and stop Supervisor process control system
# Description: Supervisor is a client/server system that allows
#   its users to monitor and control a number of processes on
#   UNIX-like operating systems.
### END INIT INFO

# Source function library
. /etc/rc.d/init.d/functions

# Source system settings
if [ -f /etc/sysconfig/supervisord ]; then
    . /etc/sysconfig/supervisord
fi

# Path to the supervisorctl script, server binary,
# and short-form for messages.
supervisorctl=${SUPERVISORCTL-/usr/bin/supervisorctl}
supervisord=${SUPERVISORD-/usr/bin/supervisord}
prog=supervisord
pidfile=${PIDFILE-/var/run/supervisord.pid}
lockfile=${LOCKFILE-/var/lock/subsys/supervisord}
sockfile=${SOCKFILE-/var/run/supervisord.sock}
STOP_TIMEOUT=${STOP_TIMEOUT-60}
OPTIONS="${OPTIONS--c /etc/supervisord.conf}"
RETVAL=0

start() {
    echo -n $"Starting $prog: "
    daemon --pidfile=${pidfile} $supervisord $OPTIONS
    RETVAL=$?
    echo
    if [ $RETVAL -eq 0 ]; then
        touch ${lockfile}
        $supervisorctl $OPTIONS status
    fi
    return $RETVAL
}

stop() {
    echo -n $"Stopping $prog: "
    killproc -p ${pidfile} -d ${STOP_TIMEOUT} $supervisord
    RETVAL=$?
    echo
    [ $RETVAL -eq 0 ] && rm -rf ${lockfile} ${pidfile} ${sockfile}
}

reload() {
    echo -n $"Reloading $prog: "
    LSB=1 killproc -p $pidfile $supervisord -HUP
    RETVAL=$?
    echo
    if [ $RETVAL -eq 7 ]; then
        failure $"$prog reload"
    else
        $supervisorctl $OPTIONS status
    fi
}

restart() {
    stop
    start
}

case "$1" in
    start)
        start
        ;;
    stop)
        stop
        ;;
    status)
        status -p ${pidfile} $supervisord
        RETVAL=$?
        [ $RETVAL -eq 0 ] && $supervisorctl $OPTIONS status
        ;;
    restart)
        restart
        ;;
    condrestart|try-restart)
        if status -p ${pidfile} $supervisord >&/dev/null; then
          stop
          start
        fi
        ;;
    force-reload|reload)
        reload
        ;;
    *)
        echo $"Usage: $prog {start|stop|restart|condrestart|try-restart|force-reload|reload}"
        RETVAL=2
esac

exit $RETVAL
```

- make it executable by all users:

```shell
chmod a+x /etc/init.d/supervisord
```

- You would next want to confirm that the supervisord process is in fact running by running the following command:

```shell
 ps -fe | grep supervisor
```

- If you don't see /usr/bin/supervisord as a running process then you need to start it up manually:

```shell
sudo service supervisord start
```

- Add it to chkconfig, your start up process list

```shell
sudo chkconfig --add supervisord
```

- Then tell chkconfig to turn it on after boot

```shell
sudo chkconfig supervisord on
```

* **Start** laravel-worker as > `/usr/bin/supervisorctl start laravel-worker:*`
* **Start** laravel-horizon as > `/usr/bin/supervisorctl start laravel-horizon:*`

* **Check status** whether workers are running as > `/usr/bin/supervisorctl status` you show see similar output as below 

```log
laravel-worker:laravel-worker_00   RUNNING   pid 10039, uptime 0:20:35
laravel-worker:laravel-worker_01   RUNNING   pid 10040, uptime 0:20:35
laravel-worker:laravel-worker_02   RUNNING   pid 10041, uptime 0:20:35
laravel-worker:laravel-worker_03   RUNNING   pid 10042, uptime 0:20:35
laravel-worker:laravel-worker_04   RUNNING   pid 10043, uptime 0:20:35
```
* Done :tada: 
