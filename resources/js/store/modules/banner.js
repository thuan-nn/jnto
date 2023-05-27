import {ApiService} from '../../api/api.service'

const state = () => {
  return {
    banners: [],
    params: {},
    paginations: {
      currentPage: null,
      totalPages: null,
      perPage: null,
      total: null
    }
  }
}

const getters = {
  paginations: state => state.paginations,
  params: state => state.params,
  banners: state => state.banners
}

const mutations = {
  updatePagination(state, payload) {
    state.paginations = {...payload}
  },

  updateParams(state, payload) {
    state.params = {...payload}
  },

  listBanners(state, payload) {
    state.banners = [...payload]
  }
}

const actions = {
  async getList({commit}, params) {
    await ApiService.get('banners', params).then((resp) => {
      commit('updatePagination', resp.data.pagination)
      commit('updateParams', params)
      commit('listBanners', resp.data.data)
    })
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
