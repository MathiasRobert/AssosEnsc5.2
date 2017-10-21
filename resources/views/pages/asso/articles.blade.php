<!-- Partie "Article" -->
<div class="tab-pane" id="articles" role="tabpanel">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @foreach($articles as $article)
                    <div class="card card-plain card-blog">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-image">
                                    <img class="img img-raised" src="{{ $article->image }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="category text-info">{{ $article->categorie }}</h6>
                                <h3 class="card-title">
                                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->titre }}</a>
                                </h3>
                                <p class="card-description">{{ $article->texte }} …<a href="{{ route('articles.show', $article->id) }}"> Lire Plus </a></p>
                                <p class="author">
                                    {{ $article->created_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>