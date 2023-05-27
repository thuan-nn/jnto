<template>
<!--  <div class="wrapper" @keydown.enter="onSubmit">-->
  <div class="wrapper">
    <!-- Header component, contains the nav -->
    <HeaderComponent/>

    <!-- Left side column. contains the logo and sidebar -->
    <AsideLeftComponent/>

    <!-- Section content -->
    <div class="content-wrapper" style="min-height: 925.8px;">
      <router-view/>
    </div>
    <!-- End section content, contains content pages -->

    <!-- Footer component, container the reserved -->
    <FooterComponent/>
  </div>
</template>

<script>
  import HeaderComponent from '../layouts/Header.vue'
  import FooterComponent from '../layouts/Footer.vue'
  import AsideLeftComponent from '../layouts/AsideLeft.vue'

  export default {
    name: 'Index',

    components: {
      HeaderComponent,
      FooterComponent,
      AsideLeftComponent
    }

  }
</script>
<style>
  .bulk-delete select {
      width: auto;
      margin: 0 10px;
  }
</style>
