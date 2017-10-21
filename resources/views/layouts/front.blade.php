<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Mathias Robert <3 Le plus beau">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>

    <title>Assos ENSC</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/font-awesome-4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/now-ui-kit.css">
    <link rel="stylesheet" href="/css/app.css">

    @yield('css')

</head>
<body class="template-page">
<nav class="navbar navbar-toggleable-md bg-primary fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-translate">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="/">
                Assos ENSC
                @if(isset($association))
                     - {!! $association->diminutif !!}
                @endif
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <p>
                            Les Assos
                        </p>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($assoDiminutifs as $diminutif)
                            <li>
                                <a class="dropdown-item" href="/asso/{!! $diminutif !!}">{!! $diminutif !!}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/famille"><i class="now-ui-icons sport_trophy"></i> Coupe des Familles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/calabar"><i class="fa fa-beer" aria-hidden="true"></i> Calabar</a>
                </li>

                @if(Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link profile-photo dropdown-toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="profile-photo-small" style="display: inline-block;">
                                <img id="avatar" class="rounded-circle img-responsive" src="{{ Auth::user()->avatar }}"
                                     alt="avatar">
                            </div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            <li>
                                <a class="dropdown-item" href="#">Mon compte</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Mes événements</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin') }}">Admin</a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>

<div class="wrapper" id="app">

@yield('header')

@yield('content')

</div>



<!--   Core JS Files   -->
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/tether.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
<script src="/js/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
<script src="/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="/js/now-ui-kit.js" type="text/javascript"></script>
<script src="/js/app.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/vue.min.js"></script>
<script type="text/javascript" src="/js/vue-resource.min.js"></script>

@yield('scripts')


</body>

</html>