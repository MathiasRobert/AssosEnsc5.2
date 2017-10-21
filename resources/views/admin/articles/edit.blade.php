@extends('admin.layouts.default')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <form id="TypeValidation" class="form-horizontal" action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PUT') }}
                <div class="card-header card-header-with-icons" data-background-color="purple">
                    <h4 class="card-title">Editer un article</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ $article->image }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-primary btn-round btn-file">
                                        <span class="fileinput-new">Selectionner une image</span>
                                        <span class="fileinput-exists">Changer</span>
                                        <input type="file" name="image">
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
                                <input class="form-control" type="text" name="titre" value="{{ $article->titre }}" required>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Texte</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="texte" value="{{ $article->texte }}" required>
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
                                        <option value="{{ $categorie->id }}"
                                                @if($categorie->id == $article->categorie->id)
                                                selected
                                                @endif
                                        >{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-danger btn-fill"><i class="material-icons">delete</i> Supprimer</button>
                    <button type="submit" class="btn btn-success btn-fill"><i class="material-icons">edit</i> Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
@endsection