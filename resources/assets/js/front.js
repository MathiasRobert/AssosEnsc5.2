import Vue from 'vue';
import Router from 'vue-router';
import Resource from 'vue-resource';


import App from './front/app.vue';
import IndexVue from './front/index.vue';
import IndexEventsVue from './front/events.index.vue';
import ShowEventVue from './front/events.show.vue';
import AssosVue from './front/assos.vue';
import userService from './front/user.services.js';

Vue.config.debug = true;

Vue.use(Router);
Vue.use(Resource);

const router = new Router({
  mode: 'history',
  routes:[
    {
      path:'/front/index',
      name: 'index',
      component: IndexVue, 
    },
    {
      path:'/front/evenements',
      name: 'indexEvents',
      component: IndexEventsVue, 
    },
    {
      path:'/front/evenements/:id',
      name: 'showEvent',
      component: ShowEventVue, 
    },
    {
      path:'/front/associations',
      name: 'associations',
      component: AssosVue, 
    },
  ]
});


userService.getCurrentUser().then(function() {
  
  const app = new Vue({
    router,
    el:'#app',
    render : h => h(App)
  });

})

