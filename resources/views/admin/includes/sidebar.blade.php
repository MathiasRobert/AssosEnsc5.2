<div class="sidebar" data-active-color="purple" data-background-color="black">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a href="#" class="simple-text">
            {{ $association->nom }}
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="#" class="simple-text">
            {{ $association->diminutif }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ $association->logo }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{ $association->email }}
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('associations.edit', 'infos') }}">Mes informations</a>
                        </li>
                        <li>
                            <a href="{{ route('associations.edit', 'equipe') }}">Mon équipe</a>
                        </li>
                        <li>
                            <a href="{{ route('associations.edit', 'parametres') }}">Paramètres</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="@if(Route::currentRouteName() === 'admin') active @endif">
                <a href="{{ route('admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="@if(Route::currentRouteName() === 'articles.index') active @endif">
                <a href="{{ route('articles.index') }}">
                    <i class="material-icons">image</i>
                    <p>Articles</p>
                </a>
            </li>
            <li class="@if(Route::currentRouteName() === 'evenements.index') active @endif">
                <a href="{{ route('evenements.index') }}">
                    <i class="material-icons">apps</i>
                    <p>Evenements</p>
                </a>
            </li>
            <li class="@if(Route::currentRouteName() === 'actionsFamilles.index') active @endif">
                <a href="{{ route('actionsFamilles.index') }}">
                    <i class="material-icons">games</i>
                    <p>Jeux des familles</p>
                </a>
            </li>
            <li class="@if(Route::currentRouteName() === 'bieres.index') active @endif">
                <a href="{{ route('bieres.index') }}">
                    <i class="material-icons">local_drink</i>
                    <p>Bières</p>
                </a>
            </li>
        </ul>
    </div>
</div>