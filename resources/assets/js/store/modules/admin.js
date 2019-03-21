import {
  selListByParams
} from '../../api/admin'

export default {
  namespaced: true,
  actions: {
    // 查询订单列表
    async selListByParams(context, arg) {
      const response = await selListByParams(arg)
      return response.data
    }
  }
}
