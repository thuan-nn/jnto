import { ApiService } from '../api.service.js'

export const AuthService = {

  fetchUser () {
    return ApiService.get('/auth/profile').then(
      (resp) => {
        const { data } = resp.data;
        return data;
      }
    );
  },

  logout () {
    return ApiService.delete('/auth/logout')
  },

}
