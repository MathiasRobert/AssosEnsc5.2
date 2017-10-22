import Vue from 'vue';

export default {
  
  currentUser : null,

  getCurrentUser () {

  	var vm = this;
    return Vue.http.get('/api/user').then(function(data) {
    	if(data.body != ""){
    		vm.currentUser = data.body;
    	}
    });
  }
}
