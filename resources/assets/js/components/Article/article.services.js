import Vue from 'vue';

export default {
    getAll() {
        return Vue.http.get('/api/admin/articles');
    },
    getAllCategoriesArticle() {
        return Vue.http.get('/api/admin/getAllCategoriesArticle');
    },
    postArticle(data) {
        return Vue.http.post('/api/admin/articles', data);
    },
    show(id) {
        return Vue.http.get('/api/admin/articles/' + id);
    },
    getCommentsArticle(id) {
        return Vue.http.get('/api/admin/articles/' + id + '/comments');
    },
    postCommentArticle(data) {
        return Vue.http.post('/api/comments', data);
    },
    show(id) {
        return Vue.http.get('/api/admin/articles/' + id);
    },
}
