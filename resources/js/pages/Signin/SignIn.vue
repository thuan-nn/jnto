<template>
  <div class="login-box">
    <div class="login-logo">
      <a><b>JNTO</b> CMS</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <ValidationObserver tag="form"
                          ref="formLogin"
                          class="validateLogin"
                          @submit.prevent="handleSubmit">
        <InputField
            v-model="inputData.login_id"
            rules="required"
            vid="login_id"
            size="medium"
            class="mb-3"
            autofocus
            suffix-icon="el-icon-user-solid"
            :placeholder="'Please input login id'"
            :field="'Login ID'"
            :label="'Login ID'"/>

        <InputField
            v-model="inputData.password"
            rules="required|min:8|max:12"
            size="medium"
            vid="password"
            type="password"
            class="mb-3"
            :show-password="true"
            :placeholder="'Please input password'"
            :field="'Password'"
            :label="'Password'"/>

        <button type="submit" @keyup.enter="handleSubmit" class="btn btn-primary btn-block btn-flat">Đăng Nhập</button>
      </ValidationObserver>
    </div>
  </div>
</template>

<script>

import {mapActions} from 'vuex'
import {Cookie} from '../../util/cookie'
import store from "../../store";
import InputField from "../../components/form/InputField";

export default {
  name: 'SignIn',
  components: {InputField},
  data() {
    return {
      inputData: {
        login_id: '',
        password: ''
      }
    }
  },

  methods: {
    ...mapActions('auth', ['login']),

    handleSubmit() {
      this.$refs.formLogin.validate().then(success => {

        if (!success) {
          return
        }

        let data = {...this.inputData}
        this.login(data).then((resp) => {
          Cookie.setCookie('access_token', resp.access_token, resp.expires_in)

          store.dispatch('auth/checkAuth').then(() => {
            this.$router.push({name: 'Stories'})
          })

        }).catch(e => {
          this.$message.error(e.response.data.error.message)
        })

      }).catch(e => {
        this.$message.error(e.response.data.error.message)
      })
    }
  }
}
</script>

<style scoped lang="scss">
.btn-block {
  width: 40%;
  margin: 0 auto;
}

.validateLogin {
  .mb-3 {
    margin-bottom: 20px;
  }

  .btn {
    border-radius: 3px;
  }
}
</style>
