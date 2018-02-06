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

            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        @yield('contents')
                    </div>
                </div>
            </div>



            <footer class="bd-footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-01 col-md-4">
                            <img src="/images/parla_horizontal_fundoescuro.svg">
                            <p>Publicação quinzenal da Subdiretoria-Geral e Comunicação Social da Assembléia Legislativa do Estado do Rio de Janeiro
                            </p>

                                <li>Jornalista responsável: Daniella Sholl (MTB 3847)</li>
                                <li>Editor: André Coelho</li>
                                <li>Coordenação: Daniela Matta e Jorge Ramos</li>
                                <li>Equipe: Buanna Rosa, Camilla Pontes, Gustavo Natario, Isabela Cabral, Octacílio Barbosa, Tainah Vieira, Thiago Lontra, Symone Munay e Vanessa Schumacker</li>
                                <li>Edição de Arte: Daniel Tiriba e Rodrigo Cortez</li>
                                <li>Editor de Fotografia: Rafael Wallace</li>
                                <li>Secretária da Redação: Regina Torres</li>
                                <li>Estagiários: Carolina Moura, Danilo Gabriel (redes sociais), Elisa Calmon, Leon Lucius, Luís Gustavoc(foto) e Thiago Oliveira (redes sociais)</li>

{{--

                            <ul>
                                <li>Jornalista responsável: Daniella Sholl (MTB 3847)</li>
                                <li>Editor: André Coelho</li>
                                <li>Coordenação: Daniela Matta e Jorge Ramos</li>
                                <li>Equipe: Buanna Rosa, Camilla Pontes, Gustavo Natario, Isabela Cabral, Octacílio Barbosa, Tainah Vieira, Thiago Lontra, Symone Munay e Vanessa Schumacker</li>
                                <li>Edição de Arte: Daniel Tiriba e Rodrigo Cortez</li>
                                <li>Editor de Fotografia: Rafael Wallace</li>
                                <li>Secretária da Redação: Regina Torres</li>
                                <li>Estagiários: Carolina Moura, Danilo Gabriel (redes sociais), Elisa Calmon, Leon Lucius, Luís Gustavoc(foto) e Thiago Oliveira (redes sociais)</li>
                            </ul>--}}


                        </div>
                        <div class="col-md-4">
                            <h3>Edições Anteriores</h3>
                        </div>
                    </div>
                    <ul class="bd-footer-links">
                        <li><a href="https://github.com/twbs/bootstrap">GitHub</a>
                        </li>
                        <li><a href="https://twitter.com/getbootstrap">Twitter</a>
                        </li>
                        <li><a href="/docs/4.0/examples/">Examples</a>
                        </li>
                        <li><a href="/docs/4.0/about/overview/">About</a>
                        </li>
                    </ul>
                    <p>@version</p>
                    <p>2018 <a href="http://www.alerj.rj.gov.br/" target="_blank" rel="noopener">Alerj</a></p>

                </div>
            </footer>

        </div>

        <script src="/js/app.js"></script>

        @include('layouts.partials.livereload')
        @include('layouts.partials.google-analytics')
    </body>
</html>
