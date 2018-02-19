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
                    <h1 class="article-title">{{ $post->title }}</h1>
                    <h5 class="article-subtitle">{{ $post->subtitle }}</h5>
                    <div class="post-author ">{{ $post->authors_string }}</div>
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
        </div>
    </div>
@stop
