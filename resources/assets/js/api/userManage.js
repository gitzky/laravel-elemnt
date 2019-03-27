import request from '../untils/request'
// 查会员列表
export function selUserList(arg) {
  return request.post('/api/admin/selUserList/'+JSON.stringify(arg), arg)
}

// 查会员详情
export function selUserById(arg) {
  return request.post('/api/admin/selUserById/'+JSON.stringify(arg), arg)
}
