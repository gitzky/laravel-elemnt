import request from '../untils/request'
//退出
export function logout(arg) {
  return request.post('admin/api/logout')
}
// 获取用户信息
export function getMemberInfo(arg) {
  return request.post('admin/api/getMemberInfo')
}
