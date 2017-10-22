<style lang="scss">
  #articleAdminTable
      .img-article
          img{
              max-width: 100px;
          }
      .content-article
          p{
              white-space: nowrap;
              text-overflow: ellipsis;
              overflow: hidden;
              max-width: 200px;
          }
</style>

<template> 
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-header card-header-button">
                <!-- <a v-link="{ name: 'newArticle' }" class="btn btn-primary">
                    <i class="material-icons">add_circle</i> Ajouter un article
                </a>
                 --><router-link :to="{name:'newArticle'}" class="btn btn-primary">
                  <i class="material-icons">add_circle</i> Ajouter un article
                </router-link>
            </div>
            <div class="card-content">
                <h4 class="card-title">
                    Gestion des articles
                </h4>
                <div class="toolbar">

                </div>
                <div class="material-datatables">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id='articleAdminTable' class="table table-striped table-no-bordered table-hover dataTable dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="disabled-sorting">Image</th>
                                        <th class="sorting">Titre</th>
                                        <th class="sorting">Contenu</th>
                                        <th class="sorting">Categorie</th>
                                        <th class="sorting_desc">Création</th>
                                        <th class="sorting">Dernière modifs</th>
                                        <th class="disabled-sorting text-right sorting">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="article in articles" v-bind:key="article.id">
                                        <td class="img-article"><img class="img img-responsive" v-bind:src="article.image"/></td>
                                        <td> {{article.titre}}</td>
                                        <td class="content-article"><p>{{article.texte}}</p></td>
                                        <td> {{article.categorie.nom}}</td>
                                        <td> {{article.created_at}}</td>
                                        <td> {{article.updated_at}}</td>
                                        <td class="text-right">
                                            <a href=" route('articles.edit', $article->id)" class="btn btn-simple btn-info btn-icon like"><i
                                                        class="material-icons">edit</i></a>
                                            <a href=" route('articles.destroy', $article->id)" class="btn btn-simple btn-danger btn-icon remove"><i
                                                        class="material-icons">close</i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>


<script>

import articleService from './article.services.js';

export default {

  data () {
    return {
      articles: [],
    }
  },

  created(){
    this.getAllArticles();
  },

  methods: {
    getAllArticles(){
      var vm = this;
      articleService.getAll().then(function(response) {
        vm.articles = response.body;
      });
    }
  },

  events: {
  },

  watch: {
    // 'route' (to, from) {
    //   console.log(to,from);
    // }
  },

  route: {
    data ({ to }) {
      console.log(to);
      return 
    }
  }
}
</script>

