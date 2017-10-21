@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-header card-header-button">
                    <a href="{{ route('bieres.create') }}" class="btn btn-primary">
                        <i class="material-icons">add_circle</i> Ajouter une bière
                    </a>
                </div>
                <div class="card-content">
                    <h4 class="card-title">
                        Gestion des bières
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
                                            <th class="disabled-sorting">Image</th>
                                            <th class="sorting">Nom</th>
                                            <th class="sorting">Degre</th>
                                            <th class="sorting_desc">Contenance</th>
                                            <th class="sorting">Couleur</th>
                                            <th class="sorting">Prix</th>
                                            <th class="disabled-sorting text-right sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bieres as $biere)
                                        <tr>
                                            <td><img class="img img-responsive" src="{{ asset($biere->image) }}"/></td>
                                            <td>{{ $biere->nom }}</td>
                                            <td>{{ $biere->degre }}</td>
                                            <td>{{ $biere->contenance }}</td>
                                            <td>{{ $biere->couleur }}</td>
                                            <td>{{ $biere->prix }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('bieres.edit', $biere->id) }}" class="btn btn-simple btn-info btn-icon"><i
                                                            class="material-icons">edit</i></a>
                                                <button data-id="{{ $biere->id }}" data-token="{{ csrf_token() }}" class="btn btn-simple btn-danger btn-icon remove-biere"><i
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