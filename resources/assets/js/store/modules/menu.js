import {
  addMenu,
  selMenuList,
  selMenuById,
  updMenuById
} from '../../api/menu'

export default {
  namespaced: true,
  actions: {
    async addMenu(context, arg) {
      const response = await addMenu(arg)
      return response
    },
    
    async selMenuList(context, arg) {
      const response = await selMenuList(arg)
      return response.data
    },
    
    async selMenuById(context, arg) {
      const response = await selMenuById(arg)
      return response
    },
    
    async updMenuById(context, arg) {
      const response = await updMenuById(arg)
      return response
    },
  }
}
