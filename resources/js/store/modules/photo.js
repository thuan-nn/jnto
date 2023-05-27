import {ApiService} from '../../api/api.service'

const state = () => {
  return {
    photos: [],
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
  photos: state => state.photos
}

const mutations = {
  updatePagination(state, payload) {
    state.paginations = {...payload}
  },

  updateParams(state, payload) {
    state.params = {...payload}
  },

  listPhotos(state, payload) {
    state.photos = [...payload]
  }
}

const actions = {
  async getList({commit}, params) {
    await ApiService.get('photos', params).then((resp) => {
      commit('updatePagination', resp.data.pagination)
      commit('updateParams', params)
      commit('listPhotos', resp.data.data)
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
