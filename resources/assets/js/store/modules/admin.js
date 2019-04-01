import {
  logout,
  getMemberInfo
} from '../../api/admin'

export default {
  namespaced: true,
  actions: {
    async logout(context, arg) {
      const response = await logout(arg)
      return response
    },
    async getMemberInfo(context, arg) {
      const response = await getMemberInfo(arg)
      return response
    }
  }
}
