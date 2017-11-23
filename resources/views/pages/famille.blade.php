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
                            <div class="bar {{ $f->nom }}" style="width: 50px; height: {{ $f->pourcentage }}%; left: {{ $f->classement * 70 }}px;"><span class="points-graph">{{ $f->points }}</span></div>
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
                @include('pages.actionsFamilles')
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });

        $(document).ready(function()
        {
            $(document).on('click', '.pagination a',function(event)
            {
                var page=$(this).attr('href').split('page=')[1];
                getData(page);
                event.preventDefault();
            });
        });

        function getData(page){
            $.ajax(
                {
                    url: '?page=' + page,
                    datatype: "json",
                })
                .done(function(data)
                {
                    $("#actionsFamilles").html(data);
                    location.hash = page;
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('Erreur');
                });
        }

    </script>
@endsection
