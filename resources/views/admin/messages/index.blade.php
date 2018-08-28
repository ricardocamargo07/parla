@extends('layouts.admin')

@section('content')
    <style>
        [v-cloak] {
            display: none;
        }
    </style>

    <div class="container-fluid" id="vue-admin">
        <div v-cloak>
            <h1 class="text-center">{{ $message }}</h1>
        </div>
    </div>
@endsection
