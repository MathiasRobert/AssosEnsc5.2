<style lang="scss">
  
</style>

<template>
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <form id="formNewArticle" class="form-horizontal" v-on:submit.prevent="postArticle">
                    <div class="card-header card-header-with-icons" data-background-color="purple">
                        <h4 class="card-title">Ajouter un article</h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="/images/image_placeholder.jpg" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-primary btn-round btn-file">
                                            <span class="fileinput-new">Selectionner une image</span>
                                            <span class="fileinput-exists">Changer</span>
                                            <input type="file" name="image" aria-required="true">
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Titre</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input v-model='newArticle.titre' class="form-control" type="text" name="titre" required="true" aria-required="true">
                                    <span class="material-input"></span>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Texte</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input v-model='newArticle.texte' class="form-control" type="text" name="texte" required="true" aria-required="true">
                                    <span class="material-input"></span><span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Catégorie</label>
                            <div class="col-lg-5 col-md-6 col-sm-3">
                                <div class="btn-group bootstrap-select">
                                    <select class="selectpicker" data-style="btn btn-primary btn-round" name="categorie_id" v:model="categorieId">
                                    <option v-for="categorie in categories" v-bind:key='categorie.id' v-model="categorie.id"> {{categorie.nom}} </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success btn-fill"><i class="material-icons">add_circle</i> Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>

    import articleService from './article.services.js';

    export default {

 
    data () {
        return {
          newArticle:{},
          categories : []
        }
      },

      methods: {
        postArticle () {
            var form = document.getElementById('formNewArticle');
            var dataForm = new FormData(form);
            articleService.postArticle(dataForm)
            .then(function(response){
                // console.log(response);

            });

        }
      },

      events: {
      },

      route: {
        data ({ to }) {
            this.newArticle = {};

            return articleService.getAllCategoriesArticle()
                .then(function(response) {
                    
                    $('#formNewArticle .fileinput').fileinput('clear');
                    
                    return {
                        categories : response.body
                    }
                });
        }
      }
    }
</script>