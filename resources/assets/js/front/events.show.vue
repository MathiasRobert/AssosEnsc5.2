<template>
		<div>
			
	
	<!-- 	<section class="events-header" style="display: none">
			<div class="container text-left">
				<div class="row">
					<div class="col-md-6 text-center"><img class="img-responsive" v-bind:src="evenement.affiche" style="max-width: 400px;margin: 20px 0px;"></div>
					<div class="col-md-6">
						<h1>{{ evenement.titre }}</h1>
						<h2>Prix : {{ evenement.prix }} €</h2>
						<h2>Lieu : {{ evenement.lieu }}</h2>
						<h2>Du {{ evenement.dateDeb.substring(0,10) }} au {{ evenement.dateFin.substring(0,10) }} </h2>
					</div>
				</div>
				
			</div>
		</section> -->

    <div class="container">

      <div class="event-post">
         <header class="header">
            <div class="time">
              <div class="month">{{evenement.monthBegin}}</div>
              <div class="day">{{evenement.dayBegin}}</div>
              <!-- <div>{{evenement.day}}</div> -->
            </div>
            <h1 class="title text-center"><span class="line">{{ evenement.titre }}</span></h1>
        </header>
        <div class="event-img-container">
          <img class="img-responsive" v-bind:src="evenement.affiche">
          <div class="event-actions text-center" style="display: none">
            <button class="btn btn-icon">
                <i class="fa fa-heart-o"></i>
                <i> 243</i>
            </button>
            <button class="btn btn-icon">
                <i class="fa fa-check"></i>
                <i> 23</i>
            </button>
            <button class="btn btn-primary">
                Je m'inscris
            </button>
          </div>
        </div>
        
        <div class="event-content">
          <div class="row">
            <div class="col-md-8">
              <div><strong>Prix :</strong> {{ evenement.prix }} €</div>
              <div><strong>Lieu :</strong> {{ evenement.lieu }}</div>
              <div><strong>Place restantes :</strong> {{ evenement.nbMaxParticipants }}</div>
             
            </div>
            <div class="col-md-4 text-right">
              <button class="btn btn-primary">
                Je m'inscris
              </button>
            </div>
          </div>
          <div class="event-description">
            <div><strong>Description</strong></div>
            <div v-html='evenement.description'></div>
          </div>
         
          

           <!-- <hr> -->
            <!-- <h5 class="title text-center">Post your comment</h5> -->
           

          <hr>
          <div class="post-comment">
              <!-- <a class="pull-left author" href="#pablo">
                  <div class="avatar">
                        <img class="cmt-object" alt="64x64" src="">
                  </div>
              </a> -->
              <div class="cmt-body">
                    <div class="form-group is-empty"><textarea class="form-control" placeholder="Commenter cet évenement..." rows="6" v-model="commentText"></textarea><span class="material-input"></span></div>
                    <div class="cmt-footer text-right">
                         <button class="btn btn-primary" v-on:click="postComment">Commenter</button>
                    </div>
              </div>
          </div> 
          <h5 class="title text-center">{{comments.length}} Commentaires</h5>
          <ul class="js-comments-list comments-list">
                <li class="comment-container cfix user-comment" v-for="comment in comments">
                    <a target="_blank" href="https://www.behance.net/seb90grado8237" class="rf-avatar js-mini-profile" data-id="44063465">
                      <img v-bind:src="comment.user.avatar" class="rf-avatar__image js-avatar__image">
                    </a>
                      <div class="comment-text-container left relative">
                        <div class="comment-user-date-wrap ui-corner cfix">
                          <a class="user-name-link bold js-mini-profile" data-id="44063465" href="https://www.behance.net/seb90grado8237">{{comment.user.name}}</a>
                          <span class="comment-date js-format-timestamp" data-timestamp="1501963744">{{comment.updated_at}}</span>
                        </div>
                        <div class="comment-text-wrap"><div class="comment-text" v-html="comment.texte"></div></div>
                      </div>
                      <div class="comment-actions">
                        <button class="btn btn-icon comment-likes">
                            <i class="fa fa-heart-o"></i>
                            <i> 243</i>
                        </button>
                        <button class="btn btn-icon comment-likes">
                            <i class="fa fa-reply"></i>
                        </button>
                      </div>
                      <div class="comment-actions comments-to-comment">
                       <ul>
                          <li class="comment-container cfix user-comment" v-for="commentToComment in comment.comments">
                              <a target="_blank" href="https://www.behance.net/seb90grado8237" class="rf-avatar js-mini-profile" data-id="44063465">
                                <img v-bind:src="commentToComment.user.avatar" class="rf-avatar__image js-avatar__image">
                              </a>
                                <div class="comment-text-container left relative">
                                  <div class="comment-user-date-wrap ui-corner cfix">
                                    <a class="user-name-link bold js-mini-profile" data-id="44063465" href="https://www.behance.net/seb90grado8237">{{commentToComment.user.name}}</a>
                                    <span class="comment-date js-format-timestamp" data-timestamp="1501963744">{{commentToComment.updated_at}}</span>
                                  </div>
                                  <div class="comment-text-wrap"><div class="comment-text" v-html="commentToComment.texte"></div></div>
                                </div>
                                <div class="comment-actions">
                                  <button class="btn btn-icon comment-likes">
                                      <i class="fa fa-heart-o"></i>
                                      <i> 243</i>
                                  </button>
                                  <button class="btn btn-icon comment-likes">
                                    <i class="fa fa-reply"></i>
                                </button>
                                </div>
                          </li>
                      </ul>
                      </div>
                </li>
            </ul>
           
        </div>
      </div>
    </div>
  </div>
</template>

<script>

// import evenementService from './evenement.services.js';
import evenementService from '../components/Evenement/evenement.services.js';
import userService from './user.services.js';


export default {

  data () {
    return {
      evenement: {},
      comments:[],
      commentText:'',
      categories: [],
      categorieSelected:{},
    }
  },
  
  created: function() {
    var vm = this;
    vm.getEvenement().then(function(){
        vm.getComments();
    });

    console.log(userService);
    userService.getCurrentUser();

  
  },

  methods: {
    getEvenement(idEvenement){
         var vm = this;
         return evenementService.show(vm.$route.params.id).then(function(response) {
              vm.evenement = response.body;
              vm.evenement.monthBegin = moment(vm.evenement.dateDeb).format('MMMM');
              vm.evenement.dayBegin = moment(vm.evenement.dateDeb).format('D');
              vm.evenement.monthEnd = moment(vm.evenement.dateFin).format('MMMM');
              vm.evenement.dayEnd = moment(vm.evenement.dateFin).format('D');
          });
    },
    getComments(){
        var vm = this;
        return evenementService.getCommentsEvenement(vm.evenement.id).then(function(response){
            vm.comments = response.body;
        });
    },
    postComment(){
      var vm = this;

      console.log(userService.currentUser);
      if(userService.currentUser == null){
        
         // console.log(vm.$route);
         // // vm.$router.push('/api/user');
         // window.location.href = '/api/user'; 
         // vm.$route.router.go('/login/google');
         $('#modalNotAuthenticated').modal('show');
      }
      else
      {
        var data = {
          'texte' : vm.commentText,
          'commentable_id'   : vm.evenement.id,
          'commentable_type' : vm.evenement.commentable_type,
        };
        return evenementService.postCommentEvenement(data).then(function(response){
            vm.commentText = '';
            vm.getComments();
        });
      }

      
    }
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

<style lang='scss'>

@import "variables.scss";

	.cmt{
    display: block;
    h4{
      margin: 0px;
    }
    p{
      margin: 0px;
    }
    .avatar{
      img{
        width: 60px;
        border-radius: 50%;
        border: 1px solid;
        padding: 6px;
        margin-right: 10px;
      }
    }
  }

  .event-post{
    width: 900px;
    max-width: 100%;
    margin: 0 auto;
    background: white;
    /*padding: 20px 0px;*/
    margin-top: 30px;

    .header{
      padding: 20px;
      text-align: center;
      position: relative;
      /*min-height: 100px;*/
      
        .title {
          /*max-width: 350px;*/
          font-size: 27px;
          font-weight: 600;
          line-height: 1.4;
          /*margin: 20px;*/
          text-transform: uppercase;
          display: inline-block;
        /*  .line{
            border-bottom: 2px solid $mainColor;
          }*/
        }

         .time {
          position: absolute;
          /*right: 25px;*/
          right: 25px;
          margin-left: 10px;
          margin-right: 10px;
          display: block;
          font-size: 17px;
          font-weight: 600;
          font-style: italic;
          text-align: center;
          margin-bottom: 10px;

          &.right{
            left: initial;
            right: 25px;
          }
          
          .month{
            color : $mainColor;
            text-transform: uppercase;
          }
      }
    }

    .event-img-container{
      img{
        width: 100%;
      }
    }

    .event-content{
      margin: 35px auto 0 auto;
      width: 70%;
    }

    .event-description{
      margin-top:20px;
      text-align: justify;
    }

  }



.comment-container {
    margin-bottom: 25px;
    overflow: hidden; 
    position: relative; 
}

.rf-avatar {
    float: left;
    height: 50px;
    margin-right: 20px;
    min-height: 50px;
    min-width: 50px;
    width: 50px;
    img{
        border-radius: 50%;
        width: 100%;
    }
}

.comment-text-container {
    width: calc(100% - 70px);

}
.comment-text-container {
    float: left;
    position: relative;
}

.comment-container .user-name-link {
    color: #3c3c3c;
    font-size: 14px;
    font-weight: bold;
}

.comment-date {
    color: #a9a9a9;
    font-size: 11px;
}

.comments-list{
    padding: 0 20px;
    margin-top: 20px;
}

.comment-date::before {
    content: '\2022';
    margin: 0 4px 0 2px;
}

.comment-actions{
    float: left;
    width: calc(100% - 70px);
    margin-left: 70px;
    .comment-likes{
        padding: 0px;
        /*margin: 0px;*/
    }
}

.comments-to-comment{
    float: left;
    width: calc(100% - 70px);
    margin-left: 70px;
    .comment-container {
     margin-bottom: 5px; 
    }
    .comment-likes{
        padding: 0px;
        /*margin: 0px;*/
    }
}

.btn-icon{
  background: none;
  color: $mainColor;
  vertical-align: top;
  margin-right: 10px;
}

.event-img-container{
  position: relative;
  .event-actions{
    /*margin-top: 10px;*/
      position: absolute;
      bottom: 17px;
      background: white;
      padding: 20px;
      right: 0px;
      border-radius: 4px 0px 0px 4px;
  }
}


</style>