<template>
  <el-drawer
      :title="status === 'create' ? 'Add Admin' : 'Edit Admin'"
      :before-close="handleClose"
      :visible.sync="isDrawer"
      :wrapperClosable="false"
      @open="openPopup"
      direction="rtl"
      size="40%"
      custom-class="demo-drawer"
      ref="drawer"
      @keyup.enter.native="handleSubmit">
      <div class="demo-drawer__content">
        <ValidationObserver tag="form"
                          class="validateForm"
                          ref="formAdmin">

        <template v-if="status === 'create'">
          <!-- Fields -->
          <InputField
              v-model="formAdmin.login_id"
              rules="required"
              vid="login_id"
              size="medium"
              class="mb-3"
              suffix-icon="el-icon-user-solid"
              :placeholder="'Please input login id'"
              :field="'Login ID'"
              :label="'Login ID'"/>

          <!-- Fields -->
          <InputField
              v-model="formAdmin.name"
              rules="required"
              vid="name"
              size="medium"
              class="mb-3"
              suffix-icon="el-icon-edit-outline"
              :placeholder="'Please input name'"
              :field="'Name'"
              :label="'Name'"/>

          <!-- Fields -->
          <InputField
              v-model="formAdmin.password"
              rules="required|min:8|max:12"
              size="medium"
              vid="password"
              type="password"
              class="mb-3"
              :show-password="true"
              :placeholder="'Please input password'"
              :field="'Password'"
              :label="'Password'"/>

          <!-- Fields -->
          <InputField
              v-model="formAdmin.password_confirmation"
              rules="required|min:8|max:12|confirmed:password"
              vid="password_confirmation"
              size="medium"
              class="mb-3"
              :show-password="true"
              :placeholder="'Please input password confirm'"
              :field="'Comfirm Password'"
              :label="'Comfirm Password'"/>
        </template>

        <template v-else>
          <!-- Fields -->
          <InputField
              v-model="formAdmin.login_id"
              :disabled="true"
              rules="required"
              vid="login_id"
              size="medium"
              class="mb-3"
              suffix-icon="el-icon-user-solid"
              :placeholder="'Please input login id'"
              :field="'Login ID'"
              :label="'Login ID'"/>

          <!-- Fields -->
          <InputField
              v-model="formAdmin.name"
              rules="required"
              vid="name"
              size="medium"
              class="mb-3"
              suffix-icon="el-icon-edit-outline"
              :placeholder="'Please input name'"
              :field="'Name'"
              :label="'Name'"/>

          <!-- Fields -->
          <InputField
              v-model="formAdmin.password"
              rules="min:8|max:12|confirmed:password_confirmation"
              size="medium"
              vid="password"
              type="password"
              class="mb-3"
              :show-password="true"
              :placeholder="'Please input password'"
              :field="'Password'"
              :label="'Password'"/>

          <!-- Fields -->
          <InputField
              v-model="formAdmin.password_confirmation"
              rules="min:8|max:12|confirmed:password"
              vid="password_confirmation"
              size="medium"
              class="mb-3"
              :show-password="true"
              :placeholder="'Please input password confirm'"
              :field="'Comfirm Password'"
              :label="'Comfirm Password'"/>
        </template>
      </ValidationObserver>
        <div class="demo-drawer__footer">
        <el-button type="primary" @click.prevent="handleSubmit" :loading="loading">
          {{ loading ? 'Submitting ...' : 'Submit' }}
        </el-button>
        <el-button @click="handleClose">Cancel</el-button>
      </div>
      </div>
  </el-drawer>

</template>

<script>
import {ApiService} from "../../api"
import InputField from "../../components/form/InputField"
import {mapActions, mapGetters} from "vuex"

export default {
  name: "FormAdmin",

  components: {InputField},

  data() {
    return {
      loading: false,
      formAdmin: {
        name: '',
        login_id: '',
        password: '',
        password_confirmation: ''
      }
    }
  },

  props: {
    isDrawer: {
      type: Boolean,
      default: false
    },

    status: {
      type: String,
      default: ''
    },

    idAdmin: {
      type: String,
      default: ''
    }
  },

  computed: {
    ...mapGetters('admin', {
      params: 'params'
    })
  },

  methods: {
    ...mapActions('admin', ['getList']),

    // Close Drawer
    handleClose() {
      this.$refs.formAdmin.reset()
      this.$emit('update:isDrawer', false)
    },

    // Show Drawer
    async openPopup () {
      const self = this
      if (this.status === 'create') {
        // Reset Form when create click
        this.formAdmin = {
          name: '',
          login_id: '',
          password: '',
          password_confirmation: ''
        }
      } else {
        // Reset Form when edit click
        this.formAdmin = {
          name: '',
          login_id: '',
          password: '',
          password_confirmation: ''
        }

        if (this.idAdmin) {
          await ApiService.get(`admins/${this.idAdmin}`).then((resp) => {
            this.formAdmin = Object.assign(this.formAdmin, resp.data.data)
          })
        }
      }
    },

    // Submit
    handleSubmit() {
      this.loading = true
      // Validate before submit
      this.$refs.formAdmin.validate().then(success => {
        // If fail
        if (!success) {
          this.loading = false
          return
        }

        // If success
        if (this.status === 'create') {
          this.handleCreate()
        } else {
          this.handleEdit(this.idAdmin)
        }
      });
    },

    // Create
    async handleCreate() {
      await ApiService.post('admins', this.formAdmin).then(_ => {
        this.loading = false

        // Close popup
        this.handleClose()

        // Get list
        this.getList(this.params)
      }).catch(_ => {
        this.loading = false
        this.$message.error('Login id đã được đăng ký.')
      })
    },

    // Edit
    async handleEdit(id) {
      // Null delete
      await Object.keys(this.formAdmin).forEach((item, i) => {
        if (!this.formAdmin[item]) {
          delete this.formAdmin[item]
        }
      })

      await ApiService.put(`admins/${id}`, this.formAdmin).then(_ => {
        this.loading = false

        // Close popup
        this.handleClose()

        // Get list again
        this.getList(this.params)
      }).catch(_ => {
        this.loading = false
      })
    }
  }
}
</script>

<style scoped lang="scss">
.validateForm {
  display: flex;
  flex-direction: column;
  flex: 1;
}
</style>
