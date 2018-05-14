@extends('layouts.main')

@section('contents')
    <div class="container" v-if="!search">
        <div class="row swiper-row">
            <div class="col-md-12">
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div v-for="post in filteredFeaturedPosts" class="swiper-slide">
                            <article>
                                <div class="row">
                                    <figure class="col-xs-12 col-md-8">
                                        <a :href="post.link">
                                            <img class="img img-responsive article-img" :src="post.main_photo.url_lowres">
                                        </a>
                                        {{--<figcaption class="article-image-caption">--}}
                                            {{--<div v-if="post.main_photo.author_credits">--}}
                                                {{--@{{ post.main_photo.author_credits }}--}}
                                            {{--</div>--}}
                                        {{--</figcaption>--}}
                                    </figure>
                                    <div class="col-xs-12 col-md-4">
                                        <h3 class="article-title"><a :href="post.link">@{{ post.title }}</a></h3>
                                        {{--<span class="post-category"> @{{ post.category }}</span>   CATEGORIA DESABILITADA        --}}
                                        {{--<span class="post-divider">/</span> --}}
                                        {{--<span class="post-created">@{{ post.date }}</span>--}}
                                        {{--
                                            <h5 class="article-subtitle"><a :href="post.link">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>
                                        --}}
                                        <div class="article-intro" >
                                            <p v-html="post.lead_limited_featured"></p>
                                        </div>
                                        <footer>
                                            <a :href="post.link" class="readmore btn btn-primary">Leia Mais</a>
                                            {{--<span v-for="tag in post.tags">
                                                <span class="label label-default">@{{ tag }}</span>
                                            </span>--}}
                                        </footer>



                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="articles-list" v-if="!search">
        <div class="container">
            <div class="row articles-row" v-for="i in Math.ceil(tables.nonFeatured ? count(tables.nonFeatured) / edition.columns : 1)">
                {{--<article v-for="post in (filteredNonFeaturedPosts ? slice(filteredNonFeaturedPosts, (i - 1) * edition.columns, i * edition.columns) : [])" :class="'equal col-md-'+edition.column_size">--}}
                <article v-for="post in filteredNonFeaturedPosts" :class="'equal col-md-'+edition.column_size">
                    <div class="row">
                        <figure class="col-xs-12">
                            <a :href="post.link">
                                <img class="img img-responsive article-img" :src="post.main_photo.url_lowres">
                            </a>
                           {{--<figcaption class="article-image-caption">--}}
                                {{--<div v-if="post.main_photo.author_credits">--}}
                                    {{--@{{ post.main_photo.author_credits }}--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        </figure>
                    </div>

                    {{--<span class="post-created">@{{ post.date }}</span>--}}
                    <h3 class="article-title"><a :href="post.link">@{{ post.title }}</a></h3>

                    {{--<span class="post-category">@{{ post.category }}</span>--}}
                    {{--<span class="post-divider">/</span>--}}

                    {{--<h5 class="article-subtitle"><a :href="post.link">@{{ post.subtitle }}</a></h5>--}}

                    <div class="article-intro" >
                        <p v-html="post.lead_limited"></p>
                    </div>

                    <footer>
{{--                        <span v-for="tag in post.tags">
                            <span class="label label-default">@{{ tag }}</span>
                        </span>--}}

                        <a :href="post.link" class="readmore btn btn-primary">Leia Mais</a>
                    </footer>
                </article>
            </div>
        </div>
    </div>

    <div class="article-search" v-if="search">
        <div class="container">
            <h1>Resultados da procura</h1>

            <div class="articles-row">
                <article v-for="post in allFiltered" class="col-xs-12 col-md-10 col-md-offset-1 article-search-item">
                    <figure class="col-xs-12 col-md-4 ">
                        <a :href="post.link">
                            <img class="img img-responsive article-img" :src="post.main_photo.url_lowres">
                        </a>
                        {{--<figcaption class="article-image-caption">--}}
                        {{--<div v-if="post.main_photo.author_credits">--}}
                        {{--@{{ post.main_photo.author_credits }}--}}
                        {{--</div>--}}
                        {{--</figcaption>--}}
                    </figure>

                    <span class="post-created">@{{ post.date }}</span>

                    <h3 class="article-title"><a :href="post.link">@{{ post.title }}</a></h3>

                    <div class="article-intro" >
                        <p v-html="post.lead_limited"></p>
                    </div>

                    <footer>
                        <span v-for="tag in post.tags">
                            <span class="label label-default">@{{ tag }}</span>
                        </span>

                        <a :href="post.link" class="readmore btn btn-primary">Leia Mais</a>
                    </footer>
                </article>
            </div>
        </div>
    </div>
@stop
