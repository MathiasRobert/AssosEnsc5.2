<!-- Footer -->
<hr>
@if(Auth::guest())
    <a href="{{ route('logintest') }}" class="btn">Connexion test</a>
@endif
<div class="copyright text-right" style="display: inline-block; float: right;">
    Copyright &copy; Assos ENSC 2017
</div>
