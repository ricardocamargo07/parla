<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        @include('layouts.partials.favicon')

        {{--<link rel="stylesheet" href="/css/monte.css">--}}

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'apiPrefix' => '/api/v1',
                'currentPost' => isset($post) ? json_decode(json_encode($post->toArray())) : null,
            ]) !!};
        </script>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>

    <body class="bg-grey-light">
        <div id="vue-parla">
            @include('layouts.partials.header')

            @include('layouts.partials.nav')

            <div v-cloak>
                @yield('contents')
            </div>




            @include('layouts.partials.footer')
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>

        @include('layouts.partials.livereload')

        @include('layouts.partials.google-analytics')
    </body>
</html>
