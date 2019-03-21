import Vue from 'vue'
import Vuex from 'vuex'

const files = require.context('./modules/', true, /\.js$/)
const modules = {}

files.keys().forEach(key => {
  modules[key.replace(/(\.\/|\.js)/g, '')] = files(key).default
})

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    ...modules
  }
})

export default store
