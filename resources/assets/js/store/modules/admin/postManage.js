import {
  addNewPost,
  selPostList,
  selPostById,
  delPostById,
  updPostById,
  
  selPostTypeList,
  addPostType,
  delPostType,
  updPostType,
  
} from '../../../api/admin/postManage'

export default {
  namespaced: true,
  actions: {
    async addNewPost(context, arg) {
      const response = await addNewPost(arg)
      return response
    },
    async selPostList(context, arg) {
      const response = await selPostList(arg)
      return response.data
    },
    async selPostById(context, arg) {
      const response = await selPostById(arg)
      return response.data
    },
    async delPostById(context, arg) {
      const response = await delPostById(arg)
      return response
    },
    async updPostById(context, arg) {
      const response = await updPostById(arg)
      return response
    },
    async selPostTypeList(context, arg) {
      const response = await selPostTypeList(arg)
      return response.data
    },
    async addPostType(context, arg) {
      const response = await addPostType(arg)
      return response
    },
    async delPostType(context, arg) {
      const response = await delPostType(arg)
      return response
    },
    
    async updPostType(context, arg) {
      const response = await updPostType(arg)
      return response
    }
  }
}
