<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                @if(Route::currentRouteName() === 'admin')
                    Dashboard
                @elseif(Route::currentRouteName() === 'admin.association')
                    Gestion de l'association
                @elseif(Route::currentRouteName() === 'articles.index')
                    Listes des articles
                @elseif(Route::currentRouteName() === 'evenements.index')
                    Listes des évènements
                @endif
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/">
                        <i class="material-icons">web</i>
                        <p class="hidden-lg hidden-md">Site</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="profile-photo dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile-photo-small">
                            <img id="avatar" class="img-circle img-responsive" src="{{ Auth::user()->avatar }}" alt="avatar">
                        </div>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Se déconnecter
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </li>
                    </ul>
            </ul>
        </div>
    </div>
</nav>