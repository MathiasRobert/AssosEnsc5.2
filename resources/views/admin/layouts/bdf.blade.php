<!doctype html>
<html>
<head>
    @include('admin.includes.head')
</head>
<body>
<div class="wrapper">

    <div class="main-panel main">

        @include('admin.includes.navbar')

        <div class="content">

            <div class="container-fluid">

                @yield('content')

            </div>

            <footer class="row">
                @include('admin.includes.footer')
            </footer>
        </div>
    </div>
</div>
</body>

@include('admin.includes.script')
@yield('scripts')

</html>