<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/parla.css">

        <link rel="stylesheet" href="/css/monte.css">


        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'apiPrefix' => '/api/v1',
            ]) !!};
        </script>

        <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
    </head>

    <body class="bg-grey-light">
        <div id="vue-root">
            <nav class="flex items-center justify-between flex-wrap bg-red-dark p-6">
                <div class="flex items-center flex-no-shrink text-white mr-6">
                    <span class="text-3xl tracking-tight">
                        <title>{{ config('app.name') }}</title>
                    </span>
                </div>
            </nav>


{{--

            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        @yield('contents')
                    </div>
                </div>
            </div>

--}}


            @yield('contents')


            <footer class="bd-footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-01 col-md-3">
                            <img src="/images/parla_horizontal_fundoescuro.svg">
                            <p class="publication-name">Publicação quinzenal da Subdiretoria-Geral e Comunicação Social da Assembléia Legislativa do Estado do Rio de Janeiro
                            </p>
                        </div>
                        <div class="col-md-9 expediente">
                            <div class="expediente-linha"><span class="expediente-label">Jornalista responsável: </span><span class="expediente-names">Daniella Sholl (MTB 3847)</span></div>
                            <div class="expediente-linha"><span class="expediente-label">Editor: </span><span class="expediente-names">André Coelho</span></div>
                            <div class="expediente-linha"><span class="expediente-label">Coordenação: </span><span class="expediente-names">Daniela Matta e Jorge Ramos</span></div>
                            <div class="expediente-linha"><span class="expediente-label">Equipe: </span><span class="expediente-names">Buanna Rosa, Camilla Pontes, Gustavo Natario, Isabela Cabral, Octacílio Barbosa, Tainah Vieira, Thiago Lontra, Symone Munay e Vanessa Schumacker</span></div>
                            <div class="expediente-linha"><span class="expediente-label">Edição de Arte: </span><span class="expediente-names">Daniel Tiriba e Rodrigo Cortez</span></div>
                            <div class="expediente-linha"><span class="expediente-label">Editor de Fotografia: </span><span class="expediente-names">Rafael Wallace</span></div>
                            <div class="expediente-linha"><span class="expediente-label">Secretária da Redação: </span><span class="expediente-names">Regina Torres</span></div>
                            <div class="expediente-linha"><span class="expediente-label">Estagiários: </span><span class="expediente-names">Carolina Moura, Danilo Gabriel (redes sociais), Elisa Calmon, Leon Lucius, Luís Gustavoc(foto) e Thiago Oliveira (redes sociais)</span></div>
                        </div>
                    </div>
                     <span>@version</span><span>2018 <a href="http://www.alerj.rj.gov.br/" target="_blank" rel="noopener">Alerj</a></span>
                </div>
            </footer>

        </div>

        <script src="/js/app.js"></script>

        @include('layouts.partials.livereload')
        @include('layouts.partials.google-analytics')
    </body>
</html>
