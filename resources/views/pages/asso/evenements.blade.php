<!-- Partie "Evenments" -->
<div class="tab-pane active" id="evenements" role="tabpanel">
    <div class="col-md-12">
        <!-- Boutons de tri -->
      <!--   <ul class="triDate nav nav-pills nav-pills-color">
            <li class="active" onclick="triDateCroissant()"><a href="#" data-toggle="tab" aria-expanded="false">Tri date <i class="material-icons">arrow_downward</i></a>
            </li>
        </ul> -->
        <div class="table-responsive">
            <table class="table table-shopping table-center">
                <thead>
                <tr>
                    <th class="text-center">Date</th>
                    <th>Évenement</th>
                    <th></th>
                    <th class="text-right">Prix</th>
                    {{--<th class="text-center">Actions</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach ($evenements as $e)

                    <tr class='clickable-row' data-href='{{ route('evenements.show', $e->id) }}' data-date="{!! $e->dateDeb !!} {!! $e->heureDeb !!}">
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
                        {{--<td class="td-actions text-right">--}}
                                {{--<a href="{{ route('evenements.show', $e->id) }}" role="button" class="btn btn-sm btn-primary btn-block">--}}
                                    {{--En savoir plus <i class="now-ui-icons travel_info"></i>--}}
                                {{--</a>--}}
                                {{--@if(!$e->estPasse)--}}
                                    {{--<a id="" role="button" class="btn-inscription btn btn-success btn-block">--}}
                                        {{--Participer &nbsp;--}}
                                        {{--<i class="now-ui-icons ui-1_simple-add"></i>--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                        {{--</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>