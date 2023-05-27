<template>
  <el-form label-position="top">
    <el-form-item label="Banner">
      <el-upload
          action=""
          :http-request="custom"
          :show-file-list="false"
          class="avatar-uploader"
          :before-upload="beforeAvatarUpload"
          list-type="picture-card">
        <img v-if="isShow" :src="imageUrl" class="avatar" alt="img"/>
        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
      </el-upload>
      <div class="el-upload__tip" align="center">jpg/jpeg/png files with a size less than 3MB!</div>
      <template v-if="isError">
        <div class="el-upload__tip" align="center"><span class="noteBanner">*</span> Size Banner 1920 x 1080</div>
      </template>
    </el-form-item>
  </el-form>
</template>

<script>

export default {
  name: "FormBanner",

  props: {
    image: {
      type: String,
      default: ''
    },
    isCreate: {
      type: Boolean,
      default: false
    },
    isError: {
      type: Boolean,
      default: false
    }
  },

  data() {
    return {
      imageUrl: '',
      isChangImage: false
    }
  },

  watch: {
    image: {
      handler (val) {
        this.imageUrl = val
      },
      immediate: true,
      deep: true
    }
  },

  beforeDestroy () {
    this.imageUrl = ''
    this.$emit('update:image', '')
  },

  computed: {
    isShow() {
      return (this.imageUrl !== '' || this.isCreate !== true)
    }
  },

  methods: {
    beforeAvatarUpload(file) {
      const type = ['image/png', 'image/jpg', 'image/jpeg']
      const isLt3MB = file.size / 1024 / 1024 < 3;
      const checkType = type.includes(file.type)

      if (!checkType) {
        this.$message.error('Chọn hình trong các định dạng sau: PNG, JPG, JPEG');
      }

      if (!isLt3MB) {
        this.$message.error('Hình không được quá 3MB!');
      }

      if (checkType && isLt3MB) {
        this.isChangImage = true
        this.imageUrl = URL.createObjectURL(file)

        this.$emit('update:image', this.imageUrl)
        this.$emit('upload', file)
      }
    },

    // Break http request
    custom() {}
  }
}
</script>

<style lang="scss">
@import "resources/sass/components/formbanners";
.noteBanner {
  color: red;
  font-size: 25px;
  vertical-align: middle;
}
</style>
