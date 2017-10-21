@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-header card-header-button">
                    <a href="{{ route('evenements.create') }}" class="btn btn-primary">
                        <i class="material-icons">add_circle</i> Ajouter un évènement
                    </a>
                </div>
                <div class="card-content">
                    <h4 class="card-title">
                        Gestion des évènements
                    </h4>
                    <div class="toolbar">

                    </div>
                    <div class="material-datatables">
                        <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatables"
                                           class="table table-striped table-no-bordered table-hover dataTable dtr-inline">
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
                                        @foreach($evenements as $evenement)
                                            <tr>
                                                <td><img class="img img-responsive" src="{{ $evenement->affiche }}"/></td>
                                                <td>{{ $evenement->titre }}</td>
                                                <td>{{ $evenement->categorie->nom }}</td>
                                                <td>{{ $evenement->lieu }}</td>
                                                <td>{{ $evenement->prix }}</td>
                                                <td>{{ $evenement->dateDeb }}</td>
                                                <td>{{ $evenement->updated_at }}</td>
                                                <td class="text-right">
                                                    <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-simple btn-info btn-icon"><i
                                                                class="material-icons">edit</i></a>
                                                    <button data-id="{{ $evenement->id }}" data-token="{{ csrf_token() }}" class="btn btn-simple btn-danger btn-icon remove-event"><i
                                                                class="material-icons">close</i></button>
                                                </td>
                                            </tr>
                                        @endforeach
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
@endsection