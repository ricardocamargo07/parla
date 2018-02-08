@extends('layouts.main')

@section('contents')


    <div class="container">
        <div class="row swiper-row">
            <div class="col-md-12">
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">

                            <article>
                                <div class="row">
                                    <figure class="col-xs-8">
                                        <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?1" ></a>
                                        <figcaption class="article-caption">
                                        </figcaption>
                                    </figure>
                                    <div class="col-xs-4">
                                        <h3 class="article-title"><a href="/post">Your article title goes here 1</a></h3>
                                        <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                                        {{--
                                        <h5 class="article-subtitle"><a href="/post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>
                                        --}}
                                        <div class="article-intro" >
                                            <p>
                                                Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                                            </p>
                                        </div>
                                        <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                                        <footer>
                                            <span class="label label-default">alerj</span>
                                            <span class="label label-default">tags</span>
                                            <span class="label label-default">jornal</span>
                                        </footer>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <div class="swiper-slide">

                            <article>
                                <div class="row">
                                    <figure class="col-xs-8">
                                        <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?2" ></a>
                                        <figcaption class="article-caption">
                                        </figcaption>
                                    </figure>
                                    <div class="col-xs-4">
                                        <h3 class="article-title"><a href="/post">Your article title goes here 1</a></h3>
                                        <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                                        {{--
                                        <h5 class="article-subtitle"><a href="/post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>
                                        --}}
                                        <div class="article-intro" >
                                            <p>
                                                Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                                            </p>
                                        </div>
                                        <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                                        <footer>
                                            <span class="label label-default">alerj</span>
                                            <span class="label label-default">tags</span>
                                            <span class="label label-default">jornal</span>
                                        </footer>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <div class="swiper-slide">

                            <article>
                                <div class="row">
                                    <figure class="col-xs-8">
                                        <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?3" ></a>
                                        <figcaption class="article-caption">
                                        </figcaption>
                                    </figure>
                                    <div class="col-xs-4">
                                        <h3 class="article-title"><a href="/post">Your article title goes here 1</a></h3>
                                        <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                                        {{--
                                        <h5 class="article-subtitle"><a href="/post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>
                                        --}}
                                        <div class="article-intro" >
                                            <p>
                                                Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                                            </p>
                                        </div>
                                        <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                                        <footer>
                                            <span class="label label-default">alerj</span>
                                            <span class="label label-default">tags</span>
                                            <span class="label label-default">jornal</span>
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
                <article class="col-md-4">
                    <div class="row">
                        <figure class="col-xs-12">
                            <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?4" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="/post">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    {{--
                    <h5 class="article-subtitle"><a href="/post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>
                    --}}
                    <div class="article-intro" >
                        <p>
                            Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                        </p>
                    </div>
                    <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                    <footer>
                        <span class="label label-default">alerj</span>
                        <span class="label label-default">tags</span>
                        <span class="label label-default">jornal</span>
                    </footer>
                </article>
                <article class="col-md-4">
                    <div class="row">
                        <figure class="col-xs-12">
                            <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?5" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="/post">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    <div class="article-intro" >
                        <p>
                            Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                        </p>
                    </div>
                    <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                    <footer>
                        <span class="label label-default">alerj</span>
                        <span class="label label-default">tags</span>
                        <span class="label label-default">jornal</span>
                    </footer>
                </article>
                <article class="col-md-4">
                    <div class="row">
                        <figure class="col-xs-12">
                            <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?6" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="/post">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    <div class="article-intro" >
                        <p>
                            Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                        </p>
                    </div>
                    <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                    <footer>
                        <span class="label label-default">alerj</span>
                        <span class="label label-default">tags</span>
                        <span class="label label-default">jornal</span>
                    </footer>
                </article>
                <article class="col-md-4">
                    <div class="row">
                        <figure class="col-xs-12">
                            <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?7" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="/post">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    <div class="article-intro" >
                        <p>
                            Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                        </p>
                    </div>
                    <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                    <footer>
                        <span class="label label-default">alerj</span>
                        <span class="label label-default">tags</span>
                        <span class="label label-default">jornal</span>
                    </footer>
                </article>
                <article class="col-md-4">
                    <div class="row">
                        <figure class="col-xs-12">
                            <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?8" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="/post">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    <div class="article-intro" >
                        <p>
                            Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                        </p>
                    </div>
                    <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                    <footer>
                        <span class="label label-default">alerj</span>
                        <span class="label label-default">tags</span>
                        <span class="label label-default">jornal</span>
                    </footer>
                </article>
                <article class="col-md-4">
                    <div class="row">
                        <figure class="col-xs-12">
                            <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?9" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="/post">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    <div class="article-intro" >
                        <p>
                            Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                        </p>
                    </div>
                    <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                    <footer>
                        <span class="label label-default">alerj</span>
                        <span class="label label-default">tags</span>
                        <span class="label label-default">jornal</span>
                    </footer>
                </article>
                <article class="col-md-4">
                    <div class="row">
                        <figure class="col-xs-12">
                            <a href="/post"><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?10" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="/post">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    {{--
                    <h5 class="article-subtitle"><a href="/post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>
                    --}}
                    <div class="article-intro" >
                        <p>
                            Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor. Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor..
                        </p>
                    </div>
                    <a href="#" class="readmore btn btn-primary">Leia Mais</a>
                    <footer>
                        <span class="label label-default">alerj</span>
                        <span class="label label-default">tags</span>
                        <span class="label label-default">jornal</span>
                    </footer>
                </article>
            </div>
        </div>
    </div>

@stop
