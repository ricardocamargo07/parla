@extends('layouts.main')

@section('contents')




    <div class="header-main-inner">
        <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 block-logo">
                <div>
                    <div id="block-sitebranding" class="margin-top-15 clearfix site-branding block block-system block-system-branding-block no-title">


                        <a href="/monte/" title="Home" rel="home" class="site-branding-logo padding-top-20">
                            <img src="/images/parla_horizontal.png" alt="Home" class="img-responsive">

                        </a>
                    </div>

                </div>

            </div>

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 header-right">
                <div class="header-right-inner">
                    Edição Número 000<br>
                    de 06/Fevereiro/2018 à 26/Fevereiro/2018

                </div>
            </div>
        </div>
        </div>
    </div>





{{--

    <div class="slider">
        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide"><img src="/images/post-18.jpg"></div>
                            <div class="swiper-slide"><img src="/images/post-19.jpg"></div>
                            <div class="swiper-slide"><img src="/images/post-18.jpg"></div>
                            ...
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




--}}










    <div class="articles">
        <div class="container">

            <div class="row">

                <article class="col-md-4">
                    <div class="row">
                    <figure class="col-xs-12">
                        <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?random" ></a>
                        <figcaption class="article-caption">
                        </figcaption>
                    </figure>
                    </div>
                    <h3 class="article-title"><a href="">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                   {{--<h5 class="article-subtitle"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>--}}
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
                            <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?random" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    {{--<h5 class="article-subtitle"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>--}}
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
                            <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?random" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    {{--<h5 class="article-subtitle"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>--}}
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
                            <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?random" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    {{--<h5 class="article-subtitle"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>--}}
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
                            <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?random" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    {{--<h5 class="article-subtitle"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>--}}
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
                            <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?random" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    {{--<h5 class="article-subtitle"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>--}}
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
                            <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750/?random" ></a>
                            <figcaption class="article-caption">
                            </figcaption>
                        </figure>
                    </div>
                    <h3 class="article-title"><a href="">Your article title goes here</a></h3>
                    <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                    {{--<h5 class="article-subtitle"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit. </a></h5>--}}
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


                {{--
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_161664a2620%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_161664a2620%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7265625%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                        <div class="card-body">
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </div>
                                                <small class="text-muted">9 mins</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}


            </div>
        </div>
    </div>


    <div class="article-internal">
        <div class="container">

            <div class="row">

                <article class="col-md-8">
                    <div class="article-details">
                        <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span><span class="post-author ">Nome e Sobrenome do Autor</span>

                    </div>

                    <h1 class="article-title">Exposição ‘Ex Africa’ leva cultura africana ao centro do Rio</h1>
                    <h5 class="article-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit., consectetur adipiscing elit. Vestibulum pellentesque turpis ut velit malesuada suscipit.  </h5>

                    <div class="row">
                        <figure class="col-xs-12">
                            <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750" ></a>
                            <figcaption class="article-image-caption">
                                A mostra conta com vídeos, músicas, esculturas, fotogra as e pinturas que remetem à cultura africana contemporânea
                            </figcaption>
                        </figure>
                    </div>




                    <div class="article-intro" >
                        <p>
                            A representatividade dos povos africanos e a divulgação de suas identidades culturais são os temas centrais da exposição “Ex África”, que está em cartaz no Centro Cultural Banco do Brasil (CCBB) até o dia 26 de março. A mostra conta com vídeos, músicas, esculturas, fotogra as e pinturas que remetem à cultura africana contemporânea. A entrada é franca e a exposição está aberta de quarta a segunda, das 9h às 21h. A poucos metros da Assembleia Legislativa do Estado do Rio de Janeiro (Alerj), o CCBB é uma ótima opção cultural para quem trabalha no Centro e está localizado na Rua Primeiro de Março, número 66.
                        </p>
                        <p>
                            A exposição aborda desde a vida corrida nos grandes centros urbanos africanos até as desigualdades sociais presentes no continente. Entre os destaques está a sala dedicada ao Afrobeat, ritmo musical popular na cidade de Lagos, maior centro urbano da Nigéria e da África.
                        </p>

                        <h3>Fique por dentro da Alerj</h3>
                            <p>
                            Para que o Estado do Rio tenha cada vez mais exposições sobre a cultura africana e sua importância na constituição do povo brasileiro, a Alerj aprovou a Lei 7.851/18, que estabelece diretrizes para a criação de um museu afro-brasileiro na capital  uminense. A norma, de autoria do deputado Geraldo Pudim (PMDB), foi sancionada pelo governador Luiz Fernando Pezão no dia 16 de janeiro.
                        </p>
                    </div>

                    <footer>
                        <span class="label label-default">alerj</span>
                        <span class="label label-default">tags</span>
                        <span class="label label-default">jornal</span>
                    </footer>
                </article>

                <div class="col-md-4 article-side-list">
                    <article class="">
                        <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                        <div class="row">

                            <figure class="col-xs-5">
                                <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750" ></a>
                                <figcaption class="article-caption">
                                </figcaption>
                            </figure>
                            <div class="col-xs-7">
                                <h4 class="article-title"><a href="">Your article title goes here</a></h4>
                                <div class="article-intro" >
                                    <p>
                                        Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </article>

                    <article class="">
                        <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                        <div class="row">

                            <figure class="col-xs-5">
                                <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750" ></a>
                                <figcaption class="article-caption">
                                </figcaption>
                            </figure>
                            <div class="col-xs-7">
                                <h4 class="article-title"><a href="">Your article title goes here</a></h4>
                                <div class="article-intro" >
                                    <p>
                                        Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </article>
                    <article class="">
                        <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                        <div class="row">

                            <figure class="col-xs-5">
                                <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750" ></a>
                                <figcaption class="article-caption">
                                </figcaption>
                            </figure>
                            <div class="col-xs-7">
                                <h4 class="article-title"><a href="">Your article title goes here</a></h4>
                                <div class="article-intro" >
                                    <p>
                                        Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </article>
                    <article class="">
                        <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                        <div class="row">

                            <figure class="col-xs-5">
                                <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750" ></a>
                                <figcaption class="article-caption">
                                </figcaption>
                            </figure>
                            <div class="col-xs-7">
                                <h4 class="article-title"><a href="">Your article title goes here</a></h4>
                                <div class="article-intro" >
                                    <p>
                                        Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </article>
                    <article class="">
                        <span class="post-category ">Saúde</span><span class="post-divider">/</span><span class="post-created ">06 Fevereiro 2018</span>
                        <div class="row">

                            <figure class="col-xs-5">
                                <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750" ></a>
                                <figcaption class="article-caption">
                                </figcaption>
                            </figure>
                            <div class="col-xs-7">
                                <h4 class="article-title"><a href="">Your article title goes here</a></h4>
                                <div class="article-intro" >
                                    <p>
                                        Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </article>
                    <article class="">
                        <div class="row">

                            <figure class="col-xs-5">
                                <a href=""><img class="img img-responsive article-img" src="https://picsum.photos/1000/750" ></a>
                                <figcaption class="article-caption">
                                </figcaption>
                            </figure>
                            <div class="col-xs-7">
                                <h4 class="article-title"><a href="">Your article title goes here</a></h4>
                                <div class="article-intro" >
                                    <p>
                                        Phasellus et nisl quis erat imperdiet pulvinar. Vestibulum aliquam arcu nec laoreet aliquam. Pellentesque cursus porta dignissim.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </article>


                </div>

            </div>
        </div>
    </div>


{{--    <h1>Parla, bella!</h1>

    <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            ...
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>

    --}}


@stop
