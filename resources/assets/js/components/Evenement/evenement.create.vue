<template>
    <div class="col-md-12">
        <div class="card">
            <form id="TypeValidation" class="form-horizontal" v-on:submit.prevent="createEvenement">
                <div class="card-header card-header-with-icons" data-background-color="purple">
                    <h4 class="card-title">Ajouter un évènement</h4>
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
                                        <span class="fileinput-new">Selectionner une affiche</span>
                                        <span class="fileinput-exists">Changer</span>
                                        <input type="file" name="affiche">
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Titre</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="titre" required>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Lieu</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="lieu" required>
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Catégorie</label>
                        <div class="col-lg-5 col-md-6 col-sm-3">
                            <div class="btn-group bootstrap-select">
                                <select name="categorie_id" class="selectpicker" data-style="btn btn-primary btn-round"
                                        title="">
                                    @foreach($categories as $categorie)
                                        <option value="categorie.id ">categorie.nom </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Date de début</label>
                        <div class="col-sm-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input name="dateDeb" type="text" class="form-control datetimepicker" required>
                                <span class="material-input"></span></div>
                        </div>
                        <label class="col-sm-2 label-on-left">Date de fin</label>
                        <div class="col-sm-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input name="dateFin" type="text" class="form-control datetimepicker">
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Prix</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="number" name="prix" required>
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Tarifs</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="tarifs" rows="2" cols="50"></textarea>
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Description</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="description" rows="6" cols="50"></textarea>
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success btn-fill"><i class="material-icons">add_circle</i> Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>

import evenementService from './evenement.services.js';


export default {

  data () {
    return {
      evenement: {},
      comments:{},
      categories: [],
      categorieSelected:{},
      evenementLoaded : false
    }
  },
  
  created: function() {
    var vm = this;
    vm.getEvenement().then(function(){
        $('#formEditArticle .is-empty').removeClass('is-empty');
        vm.evenementLoaded = true;
        vm.getComments();
    });
  
  },

  methods: {
    createEvenement(){
        var form = document.getElementById('formEditArticle');
        var dataForm = new FormData(form);
        console.log(dataForm,form);
        evenementService.update(this.evenement.id,dataForm)
            .then(function(data){
                $.notify({
                    message: "Modifications enregistrée"
                    },
                    {
                        type: "success",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                         }
                });
            })
            .catch(function(data){
               
          })
    },
    getEvenement(idEvenement){
         var vm = this;
         return evenementService.show(this.$route.params.id).then(function(response) {
              vm.evenement = response.body;
              evenementService.getAllCategoriesEvenement()
                .then(function(response) {
                    vm.categories = response.body;
                    for (var i = 0; i < vm.categories.length; i++) {
                        if(vm.categories[i].id == vm.evenement.categorie_id){
                            vm.categorieSelected = vm.categories[i];
                        }
                    }
                });
          });
    },
    getComments(){
        var vm = this;
        return evenementService.getCommentsEvenement(this.evenement.id).then(function(response){
            vm.comments = response.body;
        });
    }
  },

  events: {
  },

  updated: function() {
    $(".selectpicker").selectpicker('refresh').selectpicker('render');
    $('.selectpicker').selectpicker('val', this.categorieSelected.id);
    $("#dtPickerBegin.datetimepicker").datetimepicker({date:new Date(this.evenement.dateDeb),format:'YYYY-MM-DD hh:mm:ss'});
    $("#dtPickerEnd.datetimepicker").datetimepicker({date:new Date(this.evenement.dateFin),format:'YYYY-MM-DD hh:mm:ss'});
  }

}
</script>