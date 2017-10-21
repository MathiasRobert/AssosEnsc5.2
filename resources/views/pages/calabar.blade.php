@extends('layouts.front')

@section('content')

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title">Les bières</h2>
                            <div class="table-responsive">
                                <table class="table table-shopping table-center">
                                    <thead>
                                        <th class="text-center">Image</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Degré</th>
                                        <th>Contenance</th>
                                        <th>Origine</th>
                                        <th>Prix</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($bieres as $b)
                                        <tr>
                                            <td>
                                                <div class="img-container">
                                                    <img src="{!! $b->image !!}" alt="image">
                                                </div>
                                            </td>
                                            <td class="td-name">
                                                {!! $b->nom !!}
                                            </td>
                                            <td>
                                                {!! $b->description !!}
                                            </td>
                                            <td class="number">
                                                {!! $b->degre !!} %
                                            </td>
                                            <td class="number text-right">
                                                {!! $b->contenance !!} cl
                                            </td>
                                            <td>
                                                {!! $b->origine !!}
                                            </td>
                                            <td class="number">
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
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            @if(Auth::guest())
                <a href="{{ route('logintest') }}" class="btn">Connexion test</a>
            @endif
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, Réalisé par
                <a href="http://www.linkedin.com/in/mathias-robert-7a5589148" target="_blank">Mathias Robert</a>.
            </div>
        </div>
    </footer>

@endsection

