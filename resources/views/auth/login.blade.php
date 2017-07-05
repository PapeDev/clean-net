@extends('layouts.master')

@section('title')

    Authentification

@endsection



@section('content')
    <div class="row">


        <div class="col-md-6 text-center">
            <img src="images/logo-clean-net.jpg" alt="Clean Net - Logo" title="Logo - Clean Net"/>
            <h1 style="font-size: 24px;">Clean Net</h1>
            <p class="text-justify"> <i class="fa fa-caret-right"></i>  Clean Net est une application de gestion de pressing. L'application peut être accessible en ligne, vous pouvez l'avoir aussi en version local personnalisée.
                <br/>
                Pour toutes <strong>informations complémentaires</strong>. Veuillez nous contacter <i class="fa fa-hand-o-down"></i></p>
            <a href="#" class="btn btn-success">Contactez-nous</a>


        </div>

        <div class="col-md-6">
            <div class="jumbotron">
                <h2 style="font-size: 26px;">Authentification</h2>
                <p class="text-justify" style="font-size: 12px;"> <i class="fa fa-caret-right" style="color: red;"></i> Connectez-vous pour accéder à l'administration de votre pressing.</p>
                <br/>

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

    <div class="row">
        <div class="col-md-6 text-center">
            <p>Avec Clean net, faites des économies</p>
        </div>
    </div>
@endsection