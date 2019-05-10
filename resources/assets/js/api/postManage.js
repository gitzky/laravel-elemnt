import request from '../untils/request'

export function addNewPost(arg) {
  return request.post('admin/api/post/addNewPost', arg)
}

export function selPostList(arg) {
  return request.post('admin/api/post/selPostListByParams', arg)
}

export function selPostById(arg) {
  return request.post('admin/api/post/selPostById', arg)
}

export function delPostById(arg) {
  return request.post('admin/api/post/delPostById', arg)
}

export function updPostById(arg) {
  return request.post('admin/api/post/updPostById', arg)
}

export function selPostTypeList(arg) {
  return request.post('admin/api/post/selPostTypeList', arg)
}

export function addPostType(arg) {
  return request.post('admin/api/post/addPostType', arg)
}

export function delPostType(arg) {
  return request.post('admin/api/post/delPostType', arg)
}

export function updPostType(arg) {
  return request.post('admin/api/post/updPostType', arg)
}