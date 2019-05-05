import request from '../untils/request'

export function addNewPost(arg) {
  return request.post('admin/api/post/addNewPost', arg)
}

export function selPostList(arg) {
  return request.post('admin/api/post/selPostListByParams', arg)
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