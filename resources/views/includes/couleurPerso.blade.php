<style>
    .avatar > img, .avatar-nav > img {
        content: url("{{ $association->logo }}")
    }

    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:visited,
    .btn-primary:focus {
        background-color: {{ $association->couleur }} !important;
    }

    .form-group.is-focused label, .form-group.is-focused label.control-label {
        color: {{ $association->couleur }} !important;
    }

    {{--.form-control, .form-group .form-control {--}}
        {{--background-image: linear-gradient({{ $association->couleur }}, {{ $association->couleur }}), linear-gradient(#D2D2D2, #D2D2D2) !important;--}}
    {{--}--}}

    .form-group:is-focused .form-control {
        background-image: linear-gradient({{ $association->couleur }}, {{ $association->couleur }}), linear-gradient(#D2D2D2, #D2D2D2) !important;
    }

    .card > .nav-tabs, .card > form > .header {
        background-color: {{ $association->couleur }} !important;
    }

    .navbar {
        background-color: {{ $association->couleur }} !important;
    }

    .dropdown-menu li > a:hover {
        background-color: {{ $association->couleur }} !important;
    }

    a, a:hover, a:focus {
        color: {{ $association->couleur }};
    }

    /*a:not(.btn), a:active:not(.btn), a:hover:not(.btn), a:focus:not(.btn) {
        background-color: transparent !important;
    }*/

    input[type=checkbox]:checked + .checkbox-material .check {
        background: {{ $association->couleur }} !important;
    }

    .nav-pills.nav-pills-color > li.active > a, .nav-pills.nav-pills-color > li.active > a:focus, .nav-pills.nav-pills-color > li.active > a:hover {
        background-color: {{ $association->couleur }} !important;
        box-shadow: 0 16px 26px -10px rgba(10, 10, 10, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(10, 10, 10, 0.2);
    }

    .panel .panel-heading a {
        color: #3C4858;
    }

    .panel .panel-heading a:hover, .panel .panel-heading a:focus {
        color: {{ $association->couleur }} !important;
        text-decoration: none;
    }
</style>