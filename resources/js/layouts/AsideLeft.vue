<template>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">

      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/assets/images/noavatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ currentUser.name }}</p>
          <span><i class="fa fa-circle text-success"></i> Online</span>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><router-link tag="a" :to="{name: 'Stories'}"><i class="fa fa-book"></i> <span>Stories</span></router-link></li>
        <li><router-link tag="a" :to="{name: 'Photos'}"><i class="fa fa-picture-o"></i> <span>Photos</span></router-link></li>
        <li><router-link tag="a" :to="{name: 'Banners'}"><i class="fa fa-object-group"></i> <span>Banners</span></router-link></li>
        <li><router-link tag="a" :to="{name: 'Admins'}"><i class="fa fa-street-view"></i> <span>Admins</span></router-link></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
</template>

<script>

  import { mapGetters } from 'vuex'

  export default {
    name: 'AsideLeft',

    computed: {
      ...mapGetters('auth', {
        currentUser: 'currentUser'
      })
    }
  }
</script>
