@extends('layouts.front')

@section('content')

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img src="/images/calabarLogo.png" alt="">
                        </div>
                        <div class="col-md-9">
                            <h1 class="text-center">CALA'BAR</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Les bières</h2>
                    <div class="table-responsive">
                        <table class="table table-shopping table-center">
                            <thead>
                            <th class="text-center">Image</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Couleur</th>
                            <th>Degré</th>
                            <th>Contenance</th>
                            <th>Origine</th>
                            <th class="text-right">Prix</th>
                            </thead>
                            <tbody>
                            @foreach ($bieres as $b)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <img src="{!! asset($b->image) !!}" alt="image">
                                        </div>
                                    </td>
                                    <td class="td-name">
                                        {!! $b->nom !!}
                                    </td>
                                    <td>
                                        {!! $b->description !!}
                                    </td>
                                    <td>
                                        {!! $b->couleur !!}
                                    </td>
                                    <td class="number text-center">
                                        {!! $b->degre !!} %
                                    </td>
                                    <td class="number text-center">
                                        {!! $b->contenance !!} cl
                                    </td>
                                    <td>
                                        {!! $b->origine !!}
                                    </td>
                                    <td class="number text-right">
                                        {!! $b->prix !!} €
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

