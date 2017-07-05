@extends('layouts.master_cleannet')

@section('title')

    Authentification Clean Net

@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('cleannet.ajouter') }}" class="btn btn-success">Ajouter une nouvelle société</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom Société</th>
                    <th>Nom</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->nomSociete }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->password }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Editer</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection