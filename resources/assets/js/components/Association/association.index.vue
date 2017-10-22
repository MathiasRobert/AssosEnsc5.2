<template>
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            
        </div>
    </div>
  </div>
</template>


<script>

import associationService from './association.services.js';

export default {

  data () {
    return {
      associations: [],
    }
  },

  methods: {
  },

  events: {
  },

  watch: {
  },

  route: {
    data ({ to }) {
      // return associationService.getAll().then(function(response) {
      //     return {
      //       associations : response.body
      //     }
      // });
    }
  }
}
</script>

<style lang="stylus">
  
</style>