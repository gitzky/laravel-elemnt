import {
  editNotice,
  selNotice
} from '../../../api/admin/webNotice'

export default {
  namespaced: true,
  actions: {
    async editNotice(context, arg) {
      const response = await editNotice(arg)
      return response
    },
    async selNotice(context, arg) {
      const response = await selNotice(arg)
      return response.data
    }
  }
}
