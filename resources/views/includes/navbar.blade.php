<!-- Barre de navigation -->
<nav class="navbar navbar-primary navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Assos ENSC</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Les Assos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @foreach($assoDiminutifs as $diminutif)
                            <li>
                                <a href="/asso/{!! $diminutif !!}">{!! $diminutif !!}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="/calendrier"><i class="material-icons">event</i> Calendrier</a>
                </li>

                @if(Auth::guest())
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="profile-photo dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile-photo-small">
                                <img id="avatar" class="img-circle img-responsive" src="{{ Auth::user()->avatar }}"
                                     alt="avatar">
                            </div>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Mon compte</a>
                            </li>
                            <li>
                                <a href="#">Mes événements</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Se déconnecter
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::check() && Auth::user()->isAdmin())
                    <li><a href="{{ route('admin') }}">Admin</a></li>
                @endif
            </ul>

        </div>
    </div>
</nav>