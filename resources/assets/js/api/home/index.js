import request from '../../untils/request'

export function selPostList(arg) {
  return request.post('home/api/index/selPostList', arg)
}

export function selNotice(arg) {
  return request.post('home/api/index/selNotice', arg)
}

export function selHotTags(arg) {
  return request.post('home/api/index/selHotTags', arg)
}

