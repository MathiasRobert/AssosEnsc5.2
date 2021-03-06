<!-- Partie "Informations" -->
<div class="tab-pane" id="informations" role="tabpanel">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2 class="title">L'équipe</h2>
                <h4 class="description">{{ $association->description_longue }}</h4>
            </div>
        </div>
        <div class="row">
            @foreach($membres as $m)
            <div class="col-md-4">
                <div class="card card-profile card-plain">
                    <div class="card-avatar">
                        <img class="img rounded-circle img-raised" src="{!! asset($m->photo) !!}">
                    </div>
                    <div class="card-block">
                        <h3 class="card-title">{!! $m->prenom !!} {!! $m->nom !!}</h3>
                        <h6 class="category text-primary">{!! $m->poste !!}
                            @if($m->surnom != '')
                                &nbsp;- <i>{!! $m->surnom !!}</i>
                            @endif
                        </h6>
                        <p class="card-description">
                            {!! $m->description !!}
                        </p>
                        <div class="card-footer">
                            <a href="{!! $m->lien_facebook !!}" target="_blank" class="btn btn-icon btn-primary btn-round"><i class="fa fa-facebook-square"></i></a>
                            <a href="mailto:{!! $m->email !!}" target="_blank" class="btn btn-icon btn-primary btn-round"><i class="now-ui-icons ui-1_email-85"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
