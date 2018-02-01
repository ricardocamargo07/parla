<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="/css/app.css">

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

            @version
        </div>

        <script src="/js/app.js"></script>

        @include('layouts.partials.livereload')
        @include('layouts.partials.google-analytics')
    </body>
</html>
