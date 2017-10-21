<!-- Partie "Informations" -->
<div class="tab-pane" id="informations" role="tabpanel">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2 class="title">L'équipe</h2>
                <h4 class="description">This is the paragraph where you can write more details about your team. Keep you user engaged by providing meaningful information.</h4>
            </div>
        </div>
        <div class="row">
            @foreach($membres as $m)
            <div class="col-md-4">
                <div class="card card-profile card-plain">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img img-raised" src="{!! $m->photo !!}">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="card-title">{!! $m->prenom !!} {!! $m->nom !!}</h3>
                        <h6 class="category text-primary">{!! $m->poste !!}</h6>
                        <p class="card-description">
                            {!! $m->description !!}
                        </p>
                        <div class="card-footer">
                            <a href="{!! $m->lien_facebook !!}" class="btn btn-icon btn-primary btn-round"><i class="fa fa-facebook-square"></i></a>
                            <a href="{!! $m->email !!}" class="btn btn-icon btn-primary btn-round"><i class="now-ui-icons ui-1_email-85"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
