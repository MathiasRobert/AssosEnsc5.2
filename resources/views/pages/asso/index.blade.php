@extends('layouts.front')

@section('css')
    {{--@include('includes.couleurPerso')--}}
@endsection

@section('header')

    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset($association->photo) }}');">
        </div>
        <div class="content-center">
            <h1 class="title">{!! $association->nom !!}</h1>
            <div class="text-center">
                <a href="{!! $association->lien_facebook !!}" class="btn btn-primary btn-icon btn-round">
                    <i class="fa fa-facebook-square"></i>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="avatar">
        <img alt="Circle Image" class="rounded-circle img-raised" src="{{ asset($association->logo) }}">
    </div>
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

@section('scripts')
    <script>
        var pos = $(".avatar").position();
        var mainPos = $(".main").position();
        var width = $(".avatar").outerWidth();


        // si on redimensionne la page, on repositionne le logo de l'association
        $(window).resize(function() {
            var pos = $(".avatar").position();
            $(".avatar-nav").css({
                position: "absolute",
                left: (pos.left) - width/2 + 5 + "px"
            });
        });

        // Lors du défilement de la page, si le logo de l'association arrive sur la barre de navigation, on le fixe dessus
        $(window).scroll(function() {

            if(($('.avatar-nav').css("display") == "none") && ($(window).scrollTop() > $('.avatar').offset().top -10)) {
                $('.avatar-nav').css("display", "block");
                $('.avatar').css("opacity", "0");

            }
            else if (($('.avatar-nav').css("display") == "block") && ($(window).scrollTop() < $('.avatar').position().top - 80)) {
                $('.avatar-nav').css("display", "none");
                $('.avatar').css("opacity", "1");
            }
        });

        // lors du chargement de la page
            // on positionne le logo de l'association

            $(".avatar").css({
                top: (mainPos.top - ($(".avatar").outerHeight())/2) + "px"
            });
        var pos = $(".avatar").position();
        $(".avatar-nav").css({
            position: "absolute",
            left: (pos.left) - width/2 + 5 + "px"
        });


            if(($('.avatar-nav').css("display") == "none") && ($(window).scrollTop() > $('.avatar').offset().top -10)) {
                $('.avatar-nav').css("display", "block");
                $('.avatar').css("opacity", "0");
            }
            else if (($('.avatar-nav').css("display") == "block") && ($(window).scrollTop() < $('.avatar').position().top - 80)) {
                $('.avatar-nav').css("display", "none");
                $('.avatar').css("opacity", "1");
            }
    </script>
@endsection
