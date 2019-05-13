import request from '../../untils/request'

export function editNotice(arg) {
  return request.post('admin/api/webNotice/editNotice',arg)
}
export function selNotice(arg) {
  return request.post('admin/api/webNotice/selNotice',arg)
}

