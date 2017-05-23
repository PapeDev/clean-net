@extends('layouts._layout-admin')

@section('title')

    Clients

@endsection



@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nouveau
            <small>Ajout d'un nouveau client</small>
        </h1>

    </section>



    <!-- Main content -->
    <section class="content">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulaire d'ajout client</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                {!! Form::open(['route'=>'clients.store', 'method'=>'post']) !!}
                    <div class="box-body">
                        <div class="form-group @if ($errors->has('title')) has-error @endif">
                            <select name="title" id="title" class="form-control">
                                <option value="Mme">Mme</option>
                                <option value="Mlle">Mlle</option>
                                <option value="Mr">Mr</option>
                            </select>
                            @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('nom')) has-error @endif">
                            {!! Form::label('nom', 'Nom') !!}
                            {!! Form::text('nom',null, ['class'=>'form-control', 'placeholder'=>'Nom']) !!}
                            @if ($errors->has('nom')) <p class="help-block">{{ $errors->first('nom') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('prenom')) has-error @endif">
                            {!! Form::label('prenom', 'Prenom') !!}
                            {!! Form::text('prenom',null, ['class'=>'form-control', 'placeholder'=>'Prénom']) !!}
                            @if ($errors->has('prenom')) <p class="help-block">{{ $errors->first('prenom') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('adresse')) has-error @endif">
                            {!! Form::label('adresse', 'Adresse') !!}
                            {!! Form::text('adresse',null, ['class'=>'form-control', 'placeholder'=>'Hann Maristes 2, villa n°45']) !!}
                            @if ($errors->has('adresse')) <p class="help-block">{{ $errors->first('adresse') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            {!! Form::label('email', 'Adresse Email') !!}
                            {!! Form::email('email',null, ['class'=>'form-control', 'placeholder'=>'modou@gmail.com']) !!}
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('tel')) has-error @endif">
                            {!! Form::label('tel', 'Téléphone') !!}
                            {!! Form::text('tel',null, ['class'=>'form-control', 'placeholder'=>'77 100 00 00']) !!}
                            @if ($errors->has('tel')) <p class="help-block">{{ $errors->first('tel') }}</p> @endif
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection