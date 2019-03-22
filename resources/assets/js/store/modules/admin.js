import {
  selListByParams
} from '../../api/admin'

export default {
  namespaced: true,
  actions: {
    async selListByParams(context, arg) {
      const response = await selListByParams(arg)
      return response
    }
  }
}
