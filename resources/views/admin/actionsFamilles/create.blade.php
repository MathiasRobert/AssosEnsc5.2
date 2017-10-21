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
            <form id="TypeValidation" class="form-horizontal" action="{{ route('actionsFamilles.store') }}"
                  method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="card-header card-header-with-icons" data-background-color="purple">
                    <h4 class="card-title">Ajouter une action</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Qui ?</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="qui" required="true">
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Quoi ?</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="quoi" required="true">
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Quand ?</label>
                        <div class="col-sm-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input name="quand" type="text" class="form-control datetimepicker" required>
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Points</label>
                        <div class="col-sm-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input name="points" type="number" class="form-control" required>
                                <span class="material-input"></span></div>
                        </div>
                        <label class="col-sm-2 label-on-left">Famille concernée</label>
                        <div class="col-lg-5 col-md-6 col-sm-3">
                            <div class="btn-group bootstrap-select">
                                <select name="famille_id" class="selectpicker" data-style="btn btn-primary btn-round"
                                        title="">
                                    @foreach($familles as $f)
                                        <option value="{{ $f->id }}">{{ $f->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success btn-fill"><i class="material-icons">add_circle</i>
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection