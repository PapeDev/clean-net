@extends('layouts.master')

@section('title')

    Authentification Clean Net

@endsection



@section('content')
    <div class="row">

        <div class="col-md-4 col-md-offset-4">
            <div class="">
                <div class="h1 text-center"><h1 style="font-size: 26px;">Authentification</h1></div>
                <br/>
                <p class="text-justify" style="font-size: 12px;"> <i class="fa fa-caret-right" style="color: red;"></i> Connectez-vous pour accéder à la gestion des sociétés de pressing.</p>
                <br/>

                {!! Form::open(['route'=>'cleannetlogin', 'method'=>'post']) !!}
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                    <div class="form-group @if ($errors->has('login')) has-error @endif">
                        {!! Form::text('login',null, ['class'=>'form-control', 'placeholder'=>'Login']) !!}
                        @if ($errors->has('login')) <p class="help-block">{{ $errors->first('login') }}</p> @endif
                    </div>
                    <div class="form-group @if ($errors->has('password')) has-error @endif">
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
                        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                    </div>
                    {{ csrf_field() }}
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection