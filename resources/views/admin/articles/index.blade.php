@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-header card-header-button">
                    <a href="{{ route('articles.create') }}" class="btn btn-primary">
                        <i class="material-icons">add_circle</i> Ajouter un article
                    </a>
                </div>
                <div class="card-content">
                    <h4 class="card-title">
                        Gestion des articles
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
                                            <th class="sorting">Titre</th>
                                            <th class="sorting">Categorie</th>
                                            <th class="sorting_desc">Création</th>
                                            <th class="sorting">Dernière modifs</th>
                                            <th class="disabled-sorting text-right sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($articles as $article)
                                        <tr>
                                            <td><img class="img img-responsive" src="{{ $article->image }}"/></td>
                                            <td>{{ $article->titre }}</td>
                                            <td>{{ $article->categorie->nom }}</td>
                                            <td>{{ $article->created_at }}</td>
                                            <td>{{ $article->updated_at }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-simple btn-info btn-icon"><i
                                                            class="material-icons">edit</i></a>
                                                <button data-id="{{ $article->id }}" data-token="{{ csrf_token() }}" class="btn btn-simple btn-danger btn-icon remove-article"><i
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