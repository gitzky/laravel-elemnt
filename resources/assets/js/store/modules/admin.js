import {
  logout
} from '../../api/admin'

export default {
  namespaced: true,
  actions: {
    async logout(context, arg) {
      const response = await logout(arg)
      return response
    }
  }
}
