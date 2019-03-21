import request from '../untils/request'

// 查会员列表
export function selListByParams(arg) {
  return request.post('/api/admin/selListByParams', arg,{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')})
}
