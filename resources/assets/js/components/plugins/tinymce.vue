<template>
  <div><textarea rows="10" v-bind:value="value"></textarea></div>
</template>


<script>

// import 'tinymce/tinymce.min.js'
// import 'tinymce/themes/modern/theme.min.js'
// import 'tinymce/skins/lightgray/skin.min.css'
// import 'tinymce/skins/lightgray/skin.min.css'
 import 'tinymce';
 import 'tinymce/themes/modern';
 // import * from 'tinymce/skin/lightgray';
 // import 'tinymce/skins/lightgray';


export default {
   
  props: ['value'],

  branding : false,
  twoWay: true,

  methods: {
    updateValue: function (value) {
      console.log(value);
      this.$emit('input', value.trim());
    }
  },

  watch:{
    value : function (val) {
      console.log(val);
    }
  },
  
  mounted: function(){
    var component = this;
    
    console.log(this.$el.children[0]);

    tinymce.init({ 
      target: this.$el.children[0],
      setup: function (editor) {
        editor.on('Change keyup', function (e) {
          component.updateValue(editor.getContent());
        })
      }
    });
  }
};
 
</script>

