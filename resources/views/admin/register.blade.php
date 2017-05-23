@extends('layouts.master')

@section('title')

    Inscription

@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="jumbotron">
                <h1>Création d'un compte</h1>

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Nom & Prenom : </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"/>
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email"/>
                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label for="login">Login : </label>
                        <input type="text" name="login" value="{{ old('login') }}" class="form-control" id="login"/>
                        @if ($errors->has('login')) <p class="help-block">{{ $errors->first('login') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" class="form-control" id="password"/>
                        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Créer un compte"/>
                        <a href="{{ route('login') }}" class="">Se connecter</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection