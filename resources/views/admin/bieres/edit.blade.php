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
            <form id="TypeValidation" class="form-horizontal" action="{{ route('admin.bieres.update', $biere->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PUT') }}
                <div class="card-header card-header-with-icons" data-background-color="purple">
                    <h4 class="card-title">Editer une bière</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ asset($biere->image) }}" alt="...">
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
                        <label class="col-sm-2 label-on-left">Nom</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="nom" value="{{ $biere->nom }}" required="true">
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Prix</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="number" step="0.1" name="prix" value="{{ $biere->prix }}" required="true">
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Degré (%)</label>
                        <div class="col-sm-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="number" step="0.01" name="degre" value="{{ $biere->degre }}" required="true">
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <label class="col-sm-2 label-on-left">Contenance (cl)</label>
                        <div class="col-sm-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="number" name="contenance" value="{{ $biere->contenance }}" required="true">
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Couleur</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="couleur" value="{{ $biere->couleur }}" required="true">
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Origine</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="origine" value="{{ $biere->origine }}">
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Description</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="description" value="{{ $biere->description }}">
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success btn-fill"><i class="material-icons">edit</i> Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
@endsection