<div class="row articles-row read-also">
    @foreach ($post->read_also as $readAlso)
        <article class="equal col-md-4">
            <div class="row">
                <figure class="col-xs-12"><a href="{{ $readAlso->link }}"><img src="{{ $readAlso->main_photo->url_lowres }}" class="img img-responsive article-img"></a></figure>
            </div>
            <h3 class="article-title"><a href="{{ $readAlso->link }}">{{ $readAlso->title }}</a></h3>
            <div class="article-intro">
                <p>
                    {!! $readAlso->lead_limited_featured !!}
                </p>
            </div>
            <footer><a href="{{ $readAlso->link }}" class="readmore btn btn-primary">Leia Mais</a></footer>
        </article>
    @endforeach
</div>
