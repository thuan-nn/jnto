import Vuex from 'vuex'
import Vue from 'vue'

// import modules
import auth from './modules/auth'
import story from './modules/story'
import photo from './modules/photo'
import banner from './modules/banner'
import admin from './modules/admin'

Vue.use(Vuex)

const modules = {
  auth,
  story,
  photo,
  banner,
  admin
}

const state = {}

const getters = {}

const mutations = {}

const actions = {}

export default new Vuex.Store({
  modules,
  state,
  getters,
  mutations,
  actions
})
