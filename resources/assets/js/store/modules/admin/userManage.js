import {
  selUserList,
  selUserById
} from '../../../api/admin/userManage'

export default {
  namespaced: true,
  actions: {
    async selUserList(context, arg) {
      const response = await selUserList(arg)
      return response
    },
    async selUserById(context, arg) {
      const response = await selUserById(arg)
      return response.data
    }
  }
}
