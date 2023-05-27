<template>
  <header class="main-header">

    <!-- Logo -->
      <router-link class="logo" :to="{name: 'Stories'}">
        <span class="logo-lg"><b>JN</b>TO</span>
      </router-link>
      <!-- logo for regular state and mobile devices -->

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/assets/images/noavatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ currentUser.name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/assets/images/noavatar.png" class="img-circle" alt="User Image">

                <p>
                  {{ currentUser.name }}
                  <small>Member since 2021</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right" @click="logout">
                  <a class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>

    </nav>
  </header>
</template>

<script>

import { mapGetters } from 'vuex'
  import { AuthService } from '../api'
  import { Cookie} from '../util/cookie'

  export default {
    name: 'Header',

    computed: {
      ...mapGetters('auth', {
        currentUser: 'currentUser'
      })
    },

    methods: {
      logout () {
        AuthService.logout().then(() => {
            Cookie.removeCookie('access_token')
            window.location.href = window.location.origin + '/cms/signin'
          }
        )
      }
    }
  }
</script>
