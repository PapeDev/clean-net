@extends('layouts.master_cleannet')

@section('title')

    Ajout Societe

@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route'=>'cleannet.store', 'method'=>'post']) !!}
                    <div class="box-body">
                        <div class="form-group @if ($errors->has('nomSociete')) has-error @endif">
                            {!! Form::label('nomSociete', 'Nom') !!}
                            {!! Form::text('nomSociete',null, ['class'=>'form-control', 'placeholder'=>'Nom Societe']) !!}
                            @if ($errors->has('nomSociete')) <p class="help-block">{{ $errors->first('nomSociete') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email',null, ['class'=>'form-control', 'placeholder'=>'Hann Maristes 2, villa n°45']) !!}
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('login')) has-error @endif">
                            {!! Form::label('login', 'Login') !!}
                            {!! Form::text('login',null, ['class'=>'form-control', 'placeholder'=>'Login']) !!}
                            @if ($errors->has('login')) <p class="help-block">{{ $errors->first('login') }}</p> @endif
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection