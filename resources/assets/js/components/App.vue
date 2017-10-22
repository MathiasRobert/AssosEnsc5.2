<template>
  
  <div class="wrapper" id="root">
    
    <div class="sidebar" data-active-color="purple" data-background-color="black">

      <div class="logo">
          <a href="#" class="simple-text">
               {{currentAssociation.nom}}
          </a>
      </div>
      <div class="logo logo-mini">
          <a href="#" class="simple-text">
               {{currentAssociation.diminutif}}
          </a>
      </div>
      <div class="sidebar-wrapper">
          <div class="user">
              <div class="photo">
                  <img v-bind:src="currentAssociation.logo" />
              </div>
              <div class="info">
                  <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                       {{currentAssociation.email}} 
                      <b class="caret"></b>
                  </a>
                  <div class="collapse" id="collapseExample">
                      <ul class="nav">
                          <li>
                              <a href="#">Mes informations</a>
                          </li>
                          <li>
                              <a href="#">Mon équipe</a>
                          </li>
                          <li>
                              <a href="#">Paramètres</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <ul class="nav">
            <li>
              <router-link :to="{name:'dashboard'}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
              </router-link>
            </li>
            <li>
              <router-link :to="{name:'article'}">
                  <i class="material-icons">assignment</i>
                  <p>Articles</p>
              </router-link>
            </li>
            <li>
              <router-link :to="{name:'evenement'}">
                  <i class="material-icons">event_note</i>
                  <p>Événements</p>
              </router-link>
            </li>
          </ul>
      </div>
  </div>

  <div class="main-panel">

      <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons visible-on-sidebar-mini">view_list</i>
                <div class="ripple-container"></div></button>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                Dashboard
                <div class="ripple-container"></div>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">dashboard</i>
                            <p class="hidden-lg hidden-md">Dashboard</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="profile-photo dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile-photo-small">
                                <img id="avatar" class="img-circle img-responsive" src="http://lorempixel.com/600/600/cats/" alt="avatar">
                            </div>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="http://localhost:8000/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Se déconnecter
                                </a>

                                <form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;"><input type="hidden" name="_token" value="F53ezuUAZ4V8IOmNOAeIbJHCtgMXa74JodDLHLti"></form>
                            </li>
                            <li>
                                <a href="/">
                                    Retour sur le site
                                </a>
                            </li>
                        </ul>
                </li></ul>
            </div>
        </div>
      </nav>
      <div class="content">
        <main>
        <transition name="fade">
          <router-view
            class="view"
            keep-alive
            transition
            transition-mode="out-in">
          </router-view>
          </transition>
        </main>
      </div>
  </div>

  </div>

  

</template>

<script>

  import associationService from './Association/association.services.js';

  export default {

    replace :false,

      data () {
        return {
          currentAssociation: {},
        }
      },

      created: function () {
        var vm = this;
        associationService.getCurrentAssociation().then(function(response) {
          vm.currentAssociation = response.body  
        });
      },

      methods: {
      },

      events: {
      },

      watch: {
      },

      route: {
        data ({ to }) {
          console.log("hello");
          
        }
      }
  }



</script>


<style lang="scss">

.sidebar .nav li > a:hover, .sidebar .nav li > a:focus, .off-canvas-sidebar .nav li > a:hover, .off-canvas-sidebar .nav li > a:focus{
    background-color: #9c27b0;
}
ul.nav{
  a.router-link-active,a:hover{
      background-color: #9c27b0;
  }
}

.fade-enter-active, .fade-leave-active {
  transition-property: opacity;
  transition-duration: .45s;
}

.fade-enter-active {
  transition-delay: .45s;
}

.fade-enter, .fade-leave-active {
  opacity: 0
}

</style>
