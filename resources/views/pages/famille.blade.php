@extends('layouts.front')

@section('content')

    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 classement-familles">
                    <h2 class="title">Classements des familles</h2>
                    <div id="chart">
                        <img src="/images/crown.png" class="crown">
                        @foreach($familles as $f)
                            <div class="bar {{ $f->nom }}" style="width: 50px; height: {{ $f->pourcentage }}%; left: {{ $f->id * 70 }}px;"><span class="points-graph">{{ $f->points }}</span></div>
                        @endforeach
                    </div>
                    <ul id="chart-inline">
                        @foreach($familles as $f)
                            <li><span class="carre-famille {{ $f->nom }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                &nbsp;{{ $f->nom }} : <strong>{{ $f->points }}</strong>
                                points</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <h4 class="title">Dernières actions</h4>
                <table class="table table-shopping table-center">
                    <thead>
                        <th>Date</th>
                        <th>Qui</th>
                        <th>Action</th>
                        <th class="text-right">Points</th>
                    </thead>
                    <tbody>
                    @foreach ($actions as $a)

                        <tr class="tr-actions" data-date="{!! $a->quand !!}">
                            <td class="text-date ">
                                {!! $a->quand !!}
                            </td>
                            <td>
                                {!! $a->qui !!}
                            </td>
                            <td class="td-name">
                                {!! $a->quoi !!}
                            </td>
                            <td class="td-number">
                                {!! $a->points !!} points
                            </td>
                            <td class="td-famille {!! $a->famille->nom !!}">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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

