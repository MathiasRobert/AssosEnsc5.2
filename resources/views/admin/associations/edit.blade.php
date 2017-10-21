@extends('admin.layouts.default')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs" data-background-color="purple">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="{{ empty($tab) || $tab == 'infos' ? 'active' : '' }}">
                            <a href="#infos" data-toggle="tab">
                                <i class="material-icons">edit</i> Mes informations
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                        <li class="{{ !empty($tab) && $tab == 'equipe' ? 'active' : '' }}">
                            <a href="#equipe" data-toggle="tab">
                                <i class="material-icons">group</i> Mon équipe
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                        <li class="{{ !empty($tab) && $tab == 'parametres' ? 'active' : '' }}">
                            <a href="#parametres" data-toggle="tab">
                                <i class="material-icons">settings</i> Paramètres
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="tab-content">
                <div class="tab-pane {{ empty($tab) || $tab == 'infos' ? 'active' : '' }}" id="infos">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('associations.update', $association->id) }}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-circle">
                                        <img src="{{ $association->logo }}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                    <div>
                                                    <span class="btn btn-round btn-primary btn-file">
                                                        <span class="fileinput-new">Ajouter un logo</span>
                                                        <span class="fileinput-exists">Changer</span>
                                                        <input type="file" name="logo">
                                                    </span>
                                        <br>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                           data-dismiss="fileinput"><i class="fa fa-times"></i> Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" value="{{ $association->nom }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Diminutif</label>
                                    <input name="diminutif" type="text" class="form-control" value="{{ $association->diminutif }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $association->email }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="btn-group bootstrap-select">
                                    <select name="couleur_id" id="select-couleur" class="selectpicker" data-style="btn btn-primary btn-round" title="Couleur">
                                        @foreach($couleurs as $couleur)
                                            <option value="{{ $couleur->id }}" style="background-color: {{ $couleur->code }}; color: whitesmoke;"
                                                    @if($couleur->id == $association->couleur->id)
                                                    selected
                                                    @endif
                                            >{{ $couleur->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Lien facebook</label>
                                    <input name="lien_facebook" type="url" class="form-control"
                                           value="{{ $association->lien_facebook }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Lien site web</label>
                                    <input name="lien_siteweb" type="url" class="form-control"
                                           value="{{ $association->lien_siteweb }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Description courte (250 lettres max)</label>
                                        <textarea name="description_courte" class="form-control"
                                                  rows="3">{{ $association->description_courte }}</textarea>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Description longue (2000 lettres max)</label>
                                        <textarea name="description_longue" class="form-control"
                                                  rows="10">{{ $association->description_longue }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Mettre à jour</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="tab-pane {{ !empty($tab) && $tab == 'equipe' ? 'active' : '' }}" id="equipe">
                    <a href="{{ route('membres.create') }}" class="btn btn-primary">
                        <i class="material-icons">add_circle</i> Ajouter un membre
                    </a>
                    <table id="datatables"
                           class="table table-striped table-no-bordered table-hover dataTable dtr-inline">
                        <thead>
                        <tr>
                            <th class="disabled-sorting">Photo</th>
                            <th class="sorting">Nom</th>
                            <th class="sorting">Prénom</th>
                            <th class="sorting">Poste</th>
                            <th class="sorting">Email</th>
                            <th class="disabled-sorting text-right sorting">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($membres as $membre)
                            <tr>
                                <td><img class="img img-responsive" src="{{ $membre->photo }}"/></td>
                                <td>{{ $membre->nom }}</td>
                                <td>{{ $membre->prenom }}</td>
                                <td>{{ $membre->poste }}</td>
                                <td>{{ $membre->email }}</td>
                                <td class="text-right">
                                    <a href="{{ route('membres.edit', $membre->id) }}" class="btn btn-simple btn-info btn-icon"><i
                                                class="material-icons">edit</i></a>
                                    <button data-id="{{ $membre->id }}" data-token="{{ csrf_token() }}" class="btn btn-simple btn-danger btn-icon remove-membre"><i
                                                class="material-icons">close</i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane {{ !empty($tab) && $tab == 'parametres' ? 'active' : '' }}" id="parametres">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span
                                                    class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs"
                                        data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                        data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked=""><span
                                                class="checkbox-material"><span class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain
                                swept through metro Detroit
                            </td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs"
                                        data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                        data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span
                                                    class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs"
                                        data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                        data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection