<template>

	<div>
<!-- 
		<section class="events-header">
			<div class="container text-center">
				<h1>
					<div><i class="fa fa-calendar"></i></div>
					Les évenements
				</h1>
			</div>
		</section> -->

		<section class="events-header-2">
			<div class="container text-left">
				<h1>
					<div><i class="fa fa-calendar"></i> Les évenements</div>
				</h1>
			</div>
		</section>

<!-- 	    <ul class="nav nav-tabs justify-content-center" role="tablist">
	        <li class="nav-item">
	            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
	               Tous
	            </a>
	        </li>
	        <li class="nav-item" v-for="categorie in categories" :key="categorie.id">
	        	<a class="nav-link" data-toggle="tab" href="#home" role="tab">
	               {{categorie.nom}}
	            </a>
	        </li>
	    </ul>
	     -->

	   <div class="tab-content text-center container">
            <div class="row">
            	<div class="col-md-4" v-for="evenement in evenements" :key="evenement.id">
		        	<div class="post-preview">
			        	<router-link :to="{ name: 'showEvent', params: { id: evenement.id }}"  class="post-box">
                                            
			               <figure>
			               		<img v-bind:src="evenement.affiche">
			               </figure>
			               <div class="post-box-content text-left clearfix">	
		               			<span class="badge badge-info">{{evenement.categorie.nom}}</span>
		               			<span class="pull-right">
	                                 {{evenement.prix}} <i class="fa fa-euro"></i>
	                            </span>
		               			<div class="post-box-title">
		               				<h5>{{evenement.titre}}</h5>
		               				<h6>{{evenement.lieu}}</h6>
	                            </div>
		                        <div class="short-description" v-html='evenement.description'></div>
		                        <div class="pull-right">
		                        	<!-- <span class="badge badge-info">{{evenement.categorie.nom}}</span> -->
					                 <div class="date">
					        	   		{{evenement.dateDeb.substring(0,10)}}
					        	   </div>
		                        </div>
			               		
			               		
			               </div>
			            </router-link>
		        	</div>
		        </div>
            </div>
        </div>

    </div>

</template>


<script>

import evenementService from '../components/Evenement/evenement.services.js';

export default {

  data () {
    return {
      categories: [],
      evenements: []
    }
  },
  
  created: function() {
    var vm = this;
  	evenementService.getAllCategoriesEvenement()
    .then(function(response) {
        vm.categories = response.body;
    });
    evenementService.getEvenements().then(function(response) {
		vm.evenements = response.body
		console.log(vm.evenements);
	});

  },

  methods: {
   
  },

  events: {
  },

  updated: function() {
    // $(".selectpicker").selectpicker('refresh').selectpicker('render');
    // $('.selectpicker').selectpicker('val', this.categorieSelected.id);
    // $("#dtPickerBegin.datetimepicker").datetimepicker({date:new Date(this.evenement.dateDeb),format:'YYYY-MM-DD hh:mm:ss'});
    // $("#dtPickerEnd.datetimepicker").datetimepicker({date:new Date(this.evenement.dateFin),format:'YYYY-MM-DD hh:mm:ss'});
  }

}

</script>


<style lang="scss">

@import "variables.scss";



.events-header{
	/*height: 200px;*/
    background: $mainColor;
    color: white;
	h1{
		padding-top: 30px;
		padding-bottom: 30px;
		margin:0px;
	}
	margin-bottom:20px;
}

.events-header-2{
	/*height: 200px;*/
    /*background: $mainColor;*/
    color: $mainColor;
	h1{
		padding-top: 30px;
		padding-bottom: 30px;
		margin:0px;
	}
}





.post-preview{
	position: relative;
	margin-bottom: 30px;
	transition : transform 500ms;

	&:focus, &:hover{
		text-decoration: none;
		transform: translateY(-5px);
	}
}
	
.post-box {

	position: relative;
	transition : transform 0.5s;

	&:focus, &:hover{
		text-decoration: none;
		/*transform: scale(1.1);*/
	}

	

	> figure{
		position: relative;
		max-height: 200px;
		overflow: hidden;
		margin:0px;
	 	/*background: $mainColor;*/
		border-radius: 4px 4px 0 0;
	    img{
	   		border-radius: 4px 4px 0 0;
	   		/*position: absolute;*/
			/*left: 0px;*/
			/*top: 0px;*/
			width: 100%;
	    }
	}

	> .post-box-content{
		text-decoration: none;
	    background: #f6f6f6;
	    border: 1px solid #ececec;
	    border-radius: 0 0 4px 4px;
	    border-top: 0;
	    color: #333;
	    font-size: 12px;
	    padding: 8px;
	    line-height: 1.5em;
	    min-height: 50px;
	    text-align: center;
		h5{
			margin: 0px;
		    display: inline-block;
		    /*border-bottom: 1px solid $mainColor;*/
		    margin-bottom: 10px;
		    & + h6{
		    	font-weight: 300;
		    }
		}

		.post-box-title{
			/*font-size: 30px;
			font-weight: 300;*/
		}
		.short-description{
			height: 30px;
			overflow: hidden;
			margin-bottom: 5px;
		}
		.badge-info {
		    background-color: $mainColor;
		    font-size: 14px;
		    margin-bottom: 14px;
		}
		/*
		ul{
			padding: 0px;
			list-style-type: none;
		}*/

	}
}

</style>
