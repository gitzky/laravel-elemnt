import request from '../untils/request'
//退出
export function logout(arg) {
  return request.post('admin/api/logout')
}
