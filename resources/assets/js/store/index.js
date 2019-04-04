import Vue from 'vue'
import Vuex from 'vuex'

const files = require.context('./modules/', true, /\.js$/)
const modules = {}

import state from './state'
  

files.keys().forEach(key => {
  modules[key.replace(/(\.\/|\.js)/g, '')] = files(key).default
})

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    ...modules
  },
  state: state,
  //显示的更改state
//   mutation:{},
//   //过滤state中的数据
//   getters:{},
//   //异步操作
//   actions:{}
})

export default store
