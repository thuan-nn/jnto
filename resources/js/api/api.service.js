import axios from 'axios/index'
import { AuthService } from '../api/service/auth.service'
import { Cookie } from '../util/cookie'
import { Loading } from 'element-ui'

const axiosInstance = axios.create({
  baseURL: '/api',
  // In case that in need token
  headers: {
    'X-Requested-With': 'XMLHttpRequest',
    'Accept': 'application/json',
    'Content-Type': 'application/json',
  },
})

const CancelToken = axios.CancelToken
const pendingRequest = {}

// Add a request interceptor for authorization
axiosInstance.interceptors.request.use(
  (config) => {

   // turn loading on
    const unLoanding = ['/auth/profile', '/auth/logout']

    if (!unLoanding.includes(config.url) && config.method === 'get') {
      Loading.service({ fullscreen: true })
    }

    // Do something before request is sent
    config.headers['Authorization'] = `Bearer ${ Cookie.findByName('access_token') }`

    // config cancel pending
    config.cancelToken = new CancelToken((canceler) => {
      AxiosRemovePending(config, canceler)
    })

    return config
  },
)

axiosInstance.interceptors.response.use(
  resp => {
      AxiosRemovePending(resp.config)

      if (_.isEmpty(pendingRequest)) {
          // turn loading off if this request is latest
        Loading.service({ fullscreen: true }).close()
      }

      return resp
  },
  error => {
    const { config, response: { status } } = error

    if (status === 401) {
      if (['/auth/signin'].includes(error.config.url)) {
        return window.location.href = window.location.origin + '/auth/signin'
      }
    }

    if (status === 403) {
      Cookie.removeCookie('access_token')
      return window.location.href = window.location.origin + '/auth/signin'
    }

    if (status === 422) {
      Loading.service({ fullscreen: true }).close()
    }

    if (status === 500) {
        return AuthService.logout().then(() => window.location.href = window.location.origin + '/auth/signin')
    }

    AxiosRemovePending(config)

    return Promise.reject(error)
  },
)

const AxiosRemovePending = axios.CancelToken = (config, canceler) => {
    let flagUrl = config.url + '&' + config.method
    flagUrl = flagUrl.replace('/api', '')

    if (flagUrl in pendingRequest) {
        if (canceler) {
            canceler('Operation canceled request:' + flagUrl) // cancel duplicate
        } else {
            delete pendingRequest[flagUrl] // delete request
        }
    } else {
        if (canceler) {
            pendingRequest[flagUrl] = canceler // store the cancel function
        }
    }
}

export const ApiService = {

  get (url, params = {}) {
    return axiosInstance.get(`${ url }`, { params })
  },

  post (url, body, config = {}) {
    return axiosInstance.post(`${ url }`, body, config)
  },

  put (url, body, params = {}) {
    return axiosInstance.put(`${ url }`, body, { params })
  },

  delete (url, params = {}) {
    return axiosInstance.delete(url, params)
  },
}
