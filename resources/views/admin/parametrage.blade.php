@extends('layouts._layout-admin')

@section('title')

    Paramétrage

@endsection



@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Paramétrage
            <small>Informations </small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
       <div class="box box-primary">
           <div class="row">
               <div class="col-md-9">
                   {!! Form::model($user, ['route'=>['admin.paramesUpdate', $user->id], 'method'=>'PUT', 'files' => true]) !!}
                   <div class="box-body">
                       <div class="row">
                           <div class="col-md-4">
                               <div class="form-group @if ($errors->has('nomSociete')) has-error @endif">
                                   {!! Form::label('nomSociete', 'Nom de la Société') !!}
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
                           <div class="col-md-8">
                               <div class="form-group @if ($errors->has('name')) has-error @endif">
                                   {!! Form::label('name', 'Nom & Prénom') !!}
                                   {!! Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nom & Prenom du propriétaire']) !!}
                                   @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                               </div>
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group @if ($errors->has('telephone')) has-error @endif">
                                           {!! Form::label('telephone', 'Téléphone') !!}
                                           {!! Form::text('telephone',null, ['class'=>'form-control', 'placeholder'=>'Telephone']) !!}
                                           @if ($errors->has('telephone')) <p class="help-block">{{ $errors->first('telephone') }}</p> @endif
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group @if ($errors->has('fax')) has-error @endif">
                                           {!! Form::label('fax', 'Fax') !!}
                                           {!! Form::text('fax',null, ['class'=>'form-control', 'placeholder'=>'Fax']) !!}
                                           @if ($errors->has('fax')) <p class="help-block">{{ $errors->first('fax') }}</p> @endif
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group @if ($errors->has('adresse')) has-error @endif">
                                           {!! Form::label('adresse', 'Adresse') !!}
                                           {!! Form::text('adresse',null, ['class'=>'form-control', 'placeholder'=>'Adresse...']) !!}
                                           @if ($errors->has('adresse')) <p class="help-block">{{ $errors->first('adresse') }}</p> @endif
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           {!! Form::label('logoSociete', 'Image') !!}
                                           <input type="file" name="logoSociete"/>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                   </div>
                   <!-- /.box-body -->

                   <div class="box-footer">
                       {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                   </div>
                   {!! Form::close() !!}
               </div>

               <div class="col-md-3">
                   <div class="box" style="margin-top: 40px;">
                       <div class="box-header with-border">
                           <h3 class="box-title">Configuration</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <a href="#" class="btn btn-default btn-block"> Gestion des gérants</a>
                           <hr>
                           <a href="{{ route('articles.index') }}" class="btn btn-default btn-block"> Gestion du Linge</a>

                       </div>
                       <!-- /.box-body -->
                   </div>
               </div>
           </div>
       </div>


    </section>
    <!-- /.content -->


@endsection