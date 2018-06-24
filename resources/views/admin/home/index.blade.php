@extends('layouts.admin')

@section('content')
    <div class="container-fluid" id="vue-admin">
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li
                    role="presentation"
                    class="active"
                    @click="__selectAdminPane()"
                >
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Admin</a>
                </li>

                <li
                    role="presentation"
                    @click="__selectPreviewPane()"
                >
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Preview</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <br>
                    @include('admin.home.partials.admin')
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    @include('admin.home.partials.preview')
                </div>
            </div>
        </div>
    </div>
@endsection
