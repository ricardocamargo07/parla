@extends('layouts.main')

@section('contents')
    <div class="article-internal">
        <div class="container">
            <div class="row">
                <article class="col-md-12">
                    <div class="article-details">
                        {{--<span class="post-category">    CATEGORIA DESABILITADA       --}}
                            {{--{{ $post->category }}--}}
                        {{--</span>--}}
                        {{--<span class="post-divider">--}}
                            {{--/--}}
                        {{--</span>--}}

                        {{--<span class="post-created ">{{ $post->date }}</span>--}}
                        {{--<div class="post-author ">{{ $post->authors_string }}</div>--}}
                    </div>

                    <div class="row">
                        <figure class="col-xs-12">
                            @if ($post->main_photo->count() > 0)
                                <img class="img img-responsive article-img" src="{{ $post->main_photo->url_lowres }}" >

                                <figcaption class="article-image-caption">
                                    <span class="article-image-author">{{ $post->main_photo->notes_and_author }}</span>
                                    {{--A mostra conta com vídeos, músicas, esculturas, fotogra as e pinturas que remetem à cultura africana contemporânea--}}
                                </figcaption>
                            @endif
                        </figure>
                    </div>
                    <h1 class="article-title">{{ $post->title }}</h1>
                    <h5 class="article-subtitle">{{ $post->subtitle }}</h5>

                    <div class="post-author">{{ $post->authors_string }}</div>
                    <div class="article-body">
                        <p>{!! $post->lead !!}</p>

                        <p>{!! $post->body !!}</p>

                        <div class="row article-gallery" > {{-- ACR - transoformar este style em css!!!! --}}
                            @foreach ($post->other_photos as $photo)
                                <figure class="col-xs-6 col-md-3">
                                    <img class="img img-responsive article-img" src="{{ $photo['url_lowres'] }}" >
                                    <figcaption class="article-image-caption">
                                        <span class="article-image-author">{{ $photo['notes_and_author'] }}</span>
                                    </figcaption>
                                </figure>
                            @endforeach
                        </div>

                        <footer class="article-tags">
                            @foreach ($post->tags as $tag)
                                <span class="label label-default article-tag">{{ $tag }}</span>
                            @endforeach
                        </footer>
                    </div>
                </article>

                {{--<div class="col-md-4 article-side-list">--}}
                    {{--<article class="">--}}
                        {{--<div class="row">--}}
                            {{--<figure class="col-xs-5">--}}
                                {{--<a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1500/1000/" ></a>--}}
                            {{--</figure>--}}
                            {{--<div class="col-xs-7">--}}
                                {{--<h4 class="article-title"><a href="/post">Your article title goes here</a></h4>--}}
                                {{--<div class="article-intro" >--}}
                                    {{--<p>--}}
                                        {{--Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</article>--}}
                    {{--<article class="">--}}
                        {{--<div class="row">--}}
                            {{--<figure class="col-xs-5">--}}
                                {{--<a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1500/1000/?image=1" ></a>--}}
                            {{--</figure>--}}
                            {{--<div class="col-xs-7">--}}
                                {{--<h4 class="article-title"><a href="/post">Your article title goes here</a></h4>--}}
                                {{--<div class="article-intro" >--}}
                                    {{--<p>--}}
                                        {{--Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</article>--}}
                    {{--<article class="">--}}
                        {{--<div class="row">--}}
                            {{--<figure class="col-xs-5">--}}
                                {{--<a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1500/1000/?image=100" ></a>--}}
                            {{--</figure>--}}
                            {{--<div class="col-xs-7">--}}
                                {{--<h4 class="article-title"><a href="/post">Your article title goes here</a></h4>--}}
                                {{--<div class="article-intro" >--}}
                                    {{--<p>--}}
                                        {{--Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</article>--}}
                    {{--<article class="">--}}
                        {{--<div class="row">--}}
                            {{--<figure class="col-xs-5">--}}
                                {{--<a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1500/1000/?image=111" ></a>--}}
                            {{--</figure>--}}
                            {{--<div class="col-xs-7">--}}
                                {{--<h4 class="article-title"><a href="/post">Your article title goes here</a></h4>--}}
                                {{--<div class="article-intro" >--}}
                                    {{--<p>--}}
                                        {{--Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</article>--}}
                {{--</div>--}}
            </div>

            <div class="row articles-row read-also">
                <article class="equal col-md-4">
                    <div class="row">
                        <figure class="col-xs-12"><a href="http://parla.test/posts/2018/2/8/a-la-la-o-mas-que-calor"><img src="/images/photos/1070-materia-saude-carnaval-rafael-wallace-1200x800.jpg" class="img img-responsive article-img"></a></figure>
                    </div>
                    <h3 class="article-title"><a href="http://parla.test/posts/2018/2/8/a-la-la-o-mas-que-calor">A-la-la-ô mas que calor...</a></h3>
                    <div class="article-intro">
                        <p>
                        <p>Fevereiro chegou e com ele os dias de folia. Fantasias prontas, agenda de blocos conferida e marchinhas na ponta da língua são primordiais para quem curte o  Carnaval no Rio de Janeiro, que esse ano s...</p>
                        </p>
                    </div>
                    <footer><a href="http://parla.test/posts/2018/2/8/a-la-la-o-mas-que-calor" class="readmore btn btn-primary">Leia Mais</a></footer>
                </article>
                <article class="equal col-md-4">
                    <div class="row">
                        <figure class="col-xs-12"><a href="http://parla.test/posts/2018/2/8/exposicao-leva-cultura-africana-ao-centro-do-rio"><img src="/images/photos/ex-africa-foto-alexandre-macieira-riotur-1200x800.jpg" class="img img-responsive article-img"></a></figure>
                    </div>
                    <h3 class="article-title"><a href="http://parla.test/posts/2018/2/8/exposicao-leva-cultura-africana-ao-centro-do-rio">Exposição leva cultura africana ao Centro do Rio</a></h3>
                    <div class="article-intro">
                        <p>
                        <p>A representatividade dos povos africanos e a divulgação de suas identidades culturais são os temas centrais da exposição “Ex África”, que está em cartaz no Centro Cultural Banco do Brasil (CCBB) até o...</p>
                        </p>
                    </div>
                    <footer><a href="http://parla.test/posts/2018/2/8/exposicao-leva-cultura-africana-ao-centro-do-rio" class="readmore btn btn-primary">Leia Mais</a></footer>
                </article>
                <article class="equal col-md-4">
                    <div class="row">
                        <figure class="col-xs-12"><a href="http://parla.test/posts/2018/2/8/curiosidades-do-palacio-tiradentes"><img src="/images/photos/antigo-restaurante-1200x800.jpg" class="img img-responsive article-img"></a></figure>
                    </div>
                    <h3 class="article-title"><a href="http://parla.test/posts/2018/2/8/curiosidades-do-palacio-tiradentes">Curiosidades do Palácio Tiradentes</a></h3>
                    <div class="article-intro">
                        <p>
                        <p>Todos que circulam diariamente pelo Palácio Tiradentes sabem que há muita história a contar nesses 92 anos de existência. O prédio chama a atenção por sua beleza arquitetônica e também pela imponência...</p>
                        </p>
                    </div>
                    <footer><a href="http://parla.test/posts/2018/2/8/curiosidades-do-palacio-tiradentes" class="readmore btn btn-primary">Leia Mais</a></footer>
                </article>
            </div>
        </div>

    </div>
@stop
