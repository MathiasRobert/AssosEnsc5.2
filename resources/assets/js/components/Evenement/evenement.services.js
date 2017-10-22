import Vue from 'vue';

export default {
  getAll () {
    return Vue.http.get('/api/admin/evenements');
  },
  getEvenements () {
    return Vue.http.get('/api/admin/evenements');
  },
  delete (id) {
    return Vue.http.delete('/api/admin/evenements/'+id);
  },
  show (id) {
    return Vue.http.get('/api/admin/evenements/'+id);
  },
  getAllCategoriesEvenement(){
    return Vue.http.get('/api/admin/getAllCategoriesEvenement/');
  },
  update(id,data){
    return Vue.http.post('/api/admin/evenements/'+id,data);
  },
  getCommentsEvenement(id){
    return Vue.http.get('/api/admin/evenements/'+id+'/comments');
  },
  postCommentEvenement(data){
    return Vue.http.post('/api/comments',data);
  },
  // postArticle (data) {
  //   return Vue.http.post('/api/admin/articles', data);
  // }
}
