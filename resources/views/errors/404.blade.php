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
@stop
