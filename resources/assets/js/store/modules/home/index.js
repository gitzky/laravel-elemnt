import {
  selPostList,
  selPostById,
  selNotice,
  selHotTags
  
} from '../../../api/home/index'

export default {
  namespaced: true,
  actions: {
    async selPostList(context, arg) {
      const response = await selPostList(arg)
      return response.data
    },
    
    async selPostById(context, arg) {
      const response = await selPostById(arg)
      return response.data
    },
    
    async selNotice(context, arg) {
      const response = await selNotice(arg)
      return response.data
    },
    
    async selHotTags(context, arg) {
      const response = await selHotTags(arg)
      return response.data
    }
    
  }
}
