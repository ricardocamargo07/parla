@extends('layouts.main')

@section('contents')
    <div class="container">
        <div class="row swiper-row">
            <div class="col-md-12">
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div v-for="post in tables.featured" class="swiper-slide">
                            <article>
                                <div class="row">
                                    <figure class="col-xs-8">
                                        <a :href="post.link">
                                            <img class="img img-responsive article-img" :src="post.main_photo.url_lowres">
                                        </a>
                                        <div v-if="post.main_photo.author" style="font-size: 0.7em;" class="text-right">
                                            por @{{ post.main_photo.author }}
                                        </div>
                                        <figcaption class="article-caption">
                                        </figcaption>
                                    </figure>
                                    <div class="col-xs-4">
                                        <h3 class="article-title"><a :href="post.link">@{{ post.title }}</a></h3> <span class="post-category "> @{{ post.category }} </span> <span class="post-divider">/</span> <span class="post-created ">@{{ post.date }}</span>
                                        {{--
                                        <h5 class="article-subtitle"><a :href="post.link">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>
                                        --}}
                                        <div class="article-intro" >
                                            <p v-html="post.lead"></p>
                                        </div>

                                        <a :href="post.link" class="readmore btn btn-primary">Leia Mais</a>

                                        <footer>
                                            <span v-for="tag in post.tags">
                                                <span class="label label-default">
                                                    @{{ tag }}
                                                </span>
                                                &nbsp;
                                            </span>
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

    <div class="articles">
        <div class="container">
            <div class="row">
                <article v-for="post in tables.nonFeatured" class="col-md-4 equal">
                    <div class="row">
                        <figure class="col-xs-12">
                            <a :href="post.link">
                                <img class="img img-responsive article-img" :src="post.main_photo.url_lowres">
                            </a>
                            <div v-if="post.main_photo.author" style="font-size: 0.7em;" class="text-right">
                                por @{{ post.main_photo.author }}
                            </div>
                            <figcaption class="article-caption"></figcaption>
                        </figure>
                    </div>

                    <h3 class="article-title"><a :href="post.link">@{{ post.title }}</a></h3>

                    <span class="post-category ">@{{ post.category }}</span><span class="post-divider">/</span><span class="post-created ">@{{ post.date }}</span>

                    <h5 class="article-subtitle"><a :href="post.link">@{{ post.subtitle }}</a></h5>

                    <div class="article-intro" >
                        <p v-html="post.lead"></p>
                    </div>

                    <a :href="post.link" class="readmore btn btn-primary">Leia Mais</a>

                    <footer>
                        <span v-for="tag in post.tags">
                            <span class="label label-default">
                                @{{ tag }}
                            </span>&nbsp;
                        </span>
                    </footer>
                </article>
            </div>
        </div>
    </div>
@stop
