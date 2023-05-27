import {ApiService} from '../../api/api.service'

const state = () => {
  return {
    stories: [],
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
  stories: state => state.stories
}

const mutations = {
  updatePagination(state, payload) {
    state.paginations = {...payload}
  },

  updateParams(state, payload) {
    state.params = {...payload}
  },

  listStories(state, payload) {
    state.stories = [...payload]
  }
}

const actions = {
  async getList({commit}, params) {
    await ApiService.get('stories', params).then((resp) => {
      commit('updatePagination', resp.data.pagination)
      commit('updateParams', params)
      commit('listStories', resp.data.data)
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
