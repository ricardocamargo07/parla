@extends('layouts.admin')

@section('content')
    <style>
        [v-cloak] {
            display: none;
        }
    </style>

    <div class="container-fluid" id="vue-admin">
        <div v-cloak>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>

                        <th>
                            Username
                        </th>

                        <th>
                            Administrador
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>

                            <td>
                                {{ $user->username }}
                            </td>

                            <td>
                                {{ $user->is_admin ? 'sim' : 'não' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
