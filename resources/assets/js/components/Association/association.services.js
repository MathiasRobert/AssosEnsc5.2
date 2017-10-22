import Vue from 'vue';

export default {
  // getAll () {
  //   return Vue.http.get('/api/admin/articles');
  // },
  getCurrentAssociation () {
    return Vue.http.get('/api/admin/getCurrentAssociation');
  },
  // postArticle (data) {
  //   return Vue.http.post('/api/admin/articles', data);
  // }
}
