@extends('layouts.main')

@section('contents')


    <div class="container text-center">


        <img  width="100"  src="/images/exclamation-triangle.svg">

        <h1>404</h1>
        <p><strong>Arquivo não encontrado</strong></p>

        <p>
            A página que você tentou acessar não existe.
        </p>

        <p>
            Verifique o endereço digitado ou clique na imagem abaixo para acessar a página inicial.<br>
            {{--For root URLs (like <code>http://parla.alerj.rj.gov.br/</code>) you must provide an
            <code>index.html</code> file.--}}
        </p>

        <a href="/" class="logo logo-img-1x">
            <img width="200" title="" alt="" src="/images/parla_horizontal.svg">
        </a>

    </div>

{{--
    <div class="container">
        <div class="row error-404">
            <div class="col-md-offset-4 col-md-4 ">
                <h2 class="text-center">Erro 404</h2>
                <h3 class="text-center">A página que você tentou acessar não existe</h3>
            </div>
        </div>
    </div>--}}




@stop
