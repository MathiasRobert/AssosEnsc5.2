@extends('layouts.front')

@section('content')

    <div class="section">
        <div class="container">
            <h1 class="title text-center">Mon compte</h1>
            <div class="row">
                <div class="col-md-3">
                    <img class="rounded-circle img-raised" src="{{ $user->avatar }}" alt="">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{ $user->name }}</h3>
                        </div>
                        <div class="col-md-2 text-right">
                            <p>Email :</p>
                        </div>
                        <div class="col-md-10">
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p>Promo :</p>
                        </div>
                        <div class="col-md-10">
                            <p>{{ $user->promo }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p>TD :</p>
                        </div>
                        <div class="col-md-10">
                            <p>{{ $user->td }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p>Famille :</p>
                        </div>
                        <div class="col-md-10">
                            <p>{{ $user->famille->nom }}</p>
                        </div>
                        <div class="col-md-10">
                            <h4>Mes actions (prochainement)</h4>
                            <table class="table table-shopping table-center">
                                <thead>
                                <th>Date</th>
                                <th>Qui</th>
                                <th>Action</th>
                                <th class="text-right">Points</th>
                                </thead>
                                <tbody>
                                {{--@foreach ($actions as $a)--}}

                                    {{--<tr class="tr-actions" data-date="{!! $a->quand !!}">--}}
                                        {{--<td class="text-date ">--}}
                                            {{--{!! $a->quand !!}--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--{!! $a->qui !!}--}}
                                        {{--</td>--}}
                                        {{--<td class="td-name">--}}
                                            {{--{!! $a->quoi !!}--}}
                                        {{--</td>--}}
                                        {{--<td class="td-number">--}}
                                            {{--{!! $a->points !!} points--}}
                                        {{--</td>--}}
                                        {{--<td class="td-famille {!! $a->famille->nom !!}">--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

