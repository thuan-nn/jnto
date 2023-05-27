import {ApiService} from '../../api/api.service'

const state = () => {
  return {
    admins: [],
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
  admins: state => state.admins,
  params: state => state.params,
  paginations: state => state.paginations
}

const mutations = {
  updateParams(state, payload){
    state.params = {...payload}
  },

  updatePaginations(state, payload){
    state.paginations = {...payload}
  },

  listAdmins(state, payload){
    state.admins = [...payload]
  }
}

const actions = {
  async getList({commit}, params){
    await ApiService.get('admins', params).then((resp) => {
      commit('updateParams', params)
      commit('updatePaginations', resp.data.pagination)
      commit('listAdmins', resp.data.data)
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
