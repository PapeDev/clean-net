@extends('layouts.master')

@section('title')

    Authentification

@endsection



@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Avec Clean net, Votre pressing restera clean !</h2>
        </div>
        <div class="col-md-6">
            <div class="jumbotron">
                <h1>Authentification</h1>
                <p>This is a template showcasing the optiona.</p>

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="" method="post">
                    <div class="form-group">
                        <label for="login">Nom d'utilisateur : </label>
                        <input type="text" name="login" value="{{ old('login') }}" class="form-control" id="login"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" class="form-control" id="password"/>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Se connecter"/>
                        <a href="#" class="">Mot de passe oublié ?</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection