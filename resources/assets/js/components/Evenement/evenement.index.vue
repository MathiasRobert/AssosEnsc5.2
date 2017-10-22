<style lang="scss">
  #evenementAdminTable
      .img-evenement
          img{
              max-width: 100px;
          }
      .content-evenement
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
            <div class="card-content">
                <h4 class="card-title">Gestion des évènements</h4>
                <div class="toolbar">
                    <div class="card-header card-header-button">
                    <!-- <a href="http://localhost:8000/admin/evenements/create" class="btn btn-primary">
                        <i class="material-icons">add_circle</i> Ajouter un évènement
                    <div class="ripple-container"></div>
                    </a> -->
                    
                    <router-link to="editEvenement" :to="{name:'createEvenement'}"  class="btn btn-primary">
                        <i class="material-icons">add_circle</i> Ajouter un évènement
                        <div class="ripple-container"></div>
                    </router-link>
                </div>
                </div>
                <div class="material-datatables">
                    <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="evenementAdminTable" class="table table-striped table-no-bordered table-hover dataTable dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="disabled-sorting">Affiche</th>
                                        <th class="sorting">Titre</th>
                                        <th class="sorting">Categorie</th>
                                        <th class="sorting">Lieu</th>
                                        <th class="sorting">Prix</th>
                                        <th class="sorting">Date</th>
                                        <th class="sorting">Dernière modifs</th>
                                        <th class="disabled-sorting text-right sorting">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="evenement in evenements" :key="evenement.id">
                                        <!-- <tr> -->
                                            <td class="img-evenement"><img class="img img-responsive" v-bind:src="evenement.affiche"/></td>
                                            <td> {{evenement.titre }}</td>
                                            <td> {{evenement.categorie.nom }}</td>
                                            <td> {{evenement.lieu }}</td>
                                            <td> {{evenement.prix }}</td>
                                            <td> {{evenement.dateDeb }}</td>
                                            <td> {{evenement.updated_at }}</td>
                                            <td class="text-right">
                                                <router-link to="editEvenement" :to="{ name: 'editEvenement', params: { id: evenement.id }}"  class="btn btn-simple btn-info btn-icon like">
                                                    <i class="material-icons">edit</i>
                                                </router-link>
                                                <button href="#" class="btn btn-simple btn-danger btn-icon remove" v-on:click="showModalConfirmDelete(evenement)"><i
                                                            class="material-icons">close</i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
</template>

<script>

import evenementService from './evenement.services.js';

export default {

  data () {
    return {
      evenements: [],
    }
  },

  created(){
    this.getAllEvents();
  },

  methods: {

    getAllEvents(){
      var vm = this;
      evenementService.getAll().then(function(response) {
        vm.evenements = response.body
      });
    },

    showModalConfirmDelete(evenementToDelete){
      var vm = this;
      swal({
            title: 'Êtes-vous sur ?',
            text: "C'est une suppression définitive !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler',
            buttonsStyling: false
        }).then(function(isConfirmed){
          vm.deleteEvenement(evenementToDelete);
        }).catch(swal.noop);
    },

    deleteEvenement(evenementToDelete){
      var vm = this;
      evenementService.delete(evenementToDelete.id)
        .then(function(data){
             vm.evenements = vm.evenements.filter(function (item) {
              return evenementToDelete.id!=item.id;
            });
            vm.showSuccessOnDelete();
        })
        .catch(function(data){
            vm.showErrorOnDelete();
      });
    },
    showErrorOnDelete(){
      $.notify({
            message: "Erreur : article non supprimé"
        },{
            timer: 2000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
    },
    showSuccessOnDelete(){
      $.notify({
            message: "Article supprimé"
        },{
            type: "success",
            timer: 2000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
    },
  },

  events: {
  },

  watch: {
  }
}
</script>

