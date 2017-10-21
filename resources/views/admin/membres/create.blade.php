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
            <form id="TypeValidation" class="form-horizontal" action="{{ route('membres.store') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="card-header card-header-with-icons" data-background-color="purple">
                    <h4 class="card-title">Ajouter un membre</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle">
                                    <img src="/images/default-avatar.png" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                <div>
                                                    <span class="btn btn-round btn-primary btn-file">
                                                        <span class="fileinput-new">Ajouter une photo</span>
                                                        <span class="fileinput-exists">Changer</span>
                                                        <input type="file" name="photo">
                                                    </span>
                                    <br>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Prénom</label>
                                <input name="prenom" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nom</label>
                                <input name="nom" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Poste</label>
                                <input name="poste" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Surnom</label>
                                <input name="surnom" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group label-floating">
                                <label class="control-label">Email</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Lien facebook</label>
                                <input name="lien_facebook" type="url" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Description (150 caractères max)</label>
                                <textarea name="description" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success btn-fill"><i class="material-icons">add_circle</i> Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection