import Vue from 'vue';
import Router from 'vue-router';
import Resource from 'vue-resource';


import App from './components/App.vue';
import DashboardView from './components/Dashboard/dashboard.vue';
import ArticleView from './components/Article/article.index.vue';
import ArticleNewView from './components/Article/article.new.vue';
import EvenementIndexView from './components/Evenement/evenement.index.vue';
import EvenementEditView from './components/Evenement/evenement.edit.vue';
import EvenementCreateView from './components/Evenement/evenement.create.vue';

import tinymceComponent from './components/plugins/tinymce.vue';

Vue.config.debug = true;

Vue.use(Router);
Vue.use(Resource);
Vue.component('tinymce',tinymceComponent);

const router = new Router({
  // history: true,
  mode: 'history',
  routes:[
    {
      path:'/back/dashboard',
      name: 'dashboard',
      component: DashboardView, 
    },
    {
      path:'/back/article/',
      name: 'article',
      component: ArticleView,
    },
   {
    path: '/back/article/new',
      name: 'newArticle',
      component: ArticleNewView,
    },
    {
      path:'/back/evenement',
      name: 'evenement',
      component: EvenementIndexView, 
    },
    {
      path:'/back/evenement/edit/:id',
      name: 'editEvenement',
      component: EvenementEditView, 
    },
    {
      path:'/back/evenement/create',
      name: 'createEvenement',
      component: EvenementCreateView, 
    },
    {
      path:'*',redirect:'/back/dashboard'
    }
  ]
});

const app = new Vue({
  router,
  el:'#app',
  render : h => h(App)
});
