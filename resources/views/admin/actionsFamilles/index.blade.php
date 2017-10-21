@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-header card-header-button">
                    <a href="{{ route('actionsFamilles.create') }}" class="btn btn-primary">
                        <i class="material-icons">add_circle</i> Ajouter une action
                    </a>
                </div>
                <div class="card-content">
                    <h4 class="card-title">
                        Gestion des actions
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
                                                <th class="sorting">Qui</th>
                                                <th class="sorting">Quoi</th>
                                                <th class="sorting_desc">Quand</th>
                                                <th class="sorting">Points</th>
                                                <th class="sorting">Famille</th>
                                                <th class="disabled-sorting text-right sorting">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($actions as $a)
                                        <tr>
                                            <td>{{ $a->qui }}</td>
                                            <td>{{ $a->quoi }}</td>
                                            <td>{{ $a->quand }}</td>
                                            <td>{{ $a->points }}</td>
                                            <td>{{ $a->famille->nom }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('actionsFamilles.edit', $a->id) }}" class="btn btn-simple btn-info btn-icon"><i
                                                            class="material-icons">edit</i></a>
                                                <button data-id="{{ $a->id }}" data-token="{{ csrf_token() }}" class="btn btn-simple btn-danger btn-icon remove-action"><i
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