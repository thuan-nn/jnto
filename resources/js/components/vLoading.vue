<template>
  <div v-show="loading" class="el-loading-mask">
    <div class="el-loading-spinner">
      <img src="../assets/msg.svg" alt="msg" class="circular">
    </div>
  </div>
</template>

<script>
  export default {
    name: 'vLoading',
    props: ['loading'],
  }
</script>

<style lang="scss">
  #contractTable {
    position: relative
  }

  .el-loading-mask {
    position: absolute;
    background-color: hsla(0, 0%, 100%, .8);
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;

    .el-loading-spinner {
      top: 50%;
      margin-top: -21px;
      width: 100%;
      text-align: center;
      position: absolute;

      .circular {
        height: 42px;
        width: 42px;
      }
    }
  }
</style>