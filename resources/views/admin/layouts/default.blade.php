<!doctype html>
<html>
<head>
    @include('admin.includes.head')
</head>
<body>
<div class="wrapper">

    @include('admin.includes.sidebar')

    <div class="main-panel">

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

</html>