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
            Verifique o endereço digitado ou clique no botão abaixo para ir à página principal:<br>
        </p>

        <a href="/" class="btn btn-primary">
            Ir para a página principal
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
