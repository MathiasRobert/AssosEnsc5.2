@extends('layouts.front')

@section('css')
    {{--@include('includes.couleurPerso')--}}
@endsection

@section('header')

    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('/images/bdeCouv.jpg');">
        </div>
        <div class="content-center">
            <h1 class="title">{!! $association->nom !!}</h1>
            <div class="text-center">
                <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                    <i class="fa fa-facebook-square"></i>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="section section-asso">
        <div class="container">

            <div class="card">
                <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" role="tab" href="#evenements">
                            <i class="now-ui-icons ui-1_calendar-60"></i> Evenements
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" role="tab" href="#articles">
                            <i class="now-ui-icons education_paper"></i> Articles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" role="tab" href="#informations">
                            <i class="now-ui-icons business_badge"></i> Informations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" role="tab" href="#contact">
                            <i class="now-ui-icons ui-1_email-85"></i> Contact
                        </a>
                    </li>
                </ul>
                <div class="card-block">
                    <div class="tab-content">
                        @include('pages.asso.evenements')
                        @include('pages.asso.articles')
                        @include('pages.asso.informations')
                        @include('pages.asso.contact')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

