@extends('layouts.front')


@section('header')

    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('/images/baim.jpg');">
        </div>
        <div class="content-center">
            <h1 class="title">Assos ENSC</h1>
        </div>
    </div>

@endsection

@section('content')

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title">Les prochains événements</h2>
                            <div class="table-responsive">
                                <table class="table table-shopping table-center">
                                    <tbody>
                                    @foreach ($evenements as $e)

                                        <tr data-date="{!! $e->dateDeb !!} {!! $e->heureDeb !!}" class='clickable-row'
                                            data-href='{{ route('evenements.show', $e->id) }}'>
                                            <td class="text-date text-center ">
                                                <span class="numJour">{!! $e->dateNumJour !!}</span>
                                                {!! $e->dateMois !!}
                                                <br>
                                                <small>{!! $e->dateJour !!}</small>
                                            </td>
                                            <td>
                                                <div class="img-container">
                                                    <img src="{!! $e->affiche !!}" alt="affiche">
                                                </div>
                                            </td>
                                            <td class="td-name">
                                                {!! $e->titre !!}
                                                <br>
                                                <small>{!! $e->heureDeb !!} - {!! $e->lieu !!}</small>
                                            </td>
                                            <td class="td-number">
                                                @if ($e->prix == 0)
                                                    Gratuit
                                                @else
                                                    {!! $e->prix !!}€
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title">Les derniers articles</h2>
                            <div class="row">
                                @foreach($articles as $a)
                                    <div class="col-md-4">
                                        <div class="card card-blog">
                                            <div class="card-image">
                                                <a href="#pablo">
                                                    <img class="img rounded" src="{{ $a->image }}">
                                                </a>
                                            </div>
                                            <div class="card-block">
                                                <h6 class="category text-primary">{{ $a->categorie }}</h6>
                                                <h5 class="card-title">
                                                    {{ $a->titre }}
                                                </h5>
                                                <p class="card-description">
                                                    {{ $a->texte }} …<a href="{{ route('articles.show', $a->id) }}">
                                                        Lire
                                                        Plus </a>
                                                </p>
                                                <div class="card-footer">
                                                    <div class="stats stats-right author">
                                                        <i class="now-ui-icons tech_watch-time"></i> {{ $a->created_at }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title text-center">
                                        Classement des familles
                                    </h4>
                                    <p class="card-description">
                                        <ul class="graph-familles">
                                            @foreach($familles as $f)
                                                <li class="{{ $f->nom }}"
                                                    style="width: {{ $f->pourcentage + 20}}%">{{ $f->points }}</li>
                                            @endforeach
                                        </ul>
                                    </p>
                                    <div class="card-footer pull-right">
                                        <a href="/famille" class="btn btn-default">Détail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title text-center">
                                        <i class="fa fa-beer" aria-hidden="true"></i>
                                         Calabar <i class="fa fa-beer" aria-hidden="true"></i>

                                    </h4>
                                    <p class="card-description">
                                        <ul class="graph-familles">
                                            @foreach($familles as $f)
                                                <li class="{{ $f->nom }}"
                                                    style="width: {{ $f->pourcentage + 20}}%">{{ $f->points }}</li>
                                            @endforeach
                                        </ul>
                                    </p>
                                    <div class="card-footer pull-right">
                                        <a href="/famille" class="btn btn-default">Détail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <footer class="footer">
        <div class="container">
            @if(Auth::guest())
                <a href="{{ route('logintest') }}" class="btn">Connexion test</a>
            @endif
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                , Réalisé par
                <a href="http://www.linkedin.com/in/mathias-robert-7a5589148" target="_blank">Mathias Robert</a>.
            </div>
        </div>
    </footer>

@endsection

