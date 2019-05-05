import {
  addNewPost,
  selPostList,
  selPostTypeList,
  addPostType,
  delPostType,
} from '../../api/postManage'

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
    }
  }
}
