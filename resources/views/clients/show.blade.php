@extends('layouts._layout-admin')

@section('title')

    Consultation

@endsection



@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Consultation
            <small>Détails Informations {{ $client->title. " " . $client->nom }}</small>
        </h1>

    </section>



    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h3 class="profile-username text-center">{{ $client->title. " " . $client->nom }}</h3>

                        {{--Etablir en fonction du nombre de commandes--}}
                        <p class="text-muted text-center">Client nouveau </p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Commandes</b> <a class="pull-right">00</a>
                            </li>
                            <li class="list-group-item">
                                <b>Retraits</b> <a class="pull-right">00</a>
                            </li>
                            <li class="list-group-item">
                                <b>Caisse</b> <a class="pull-right">00</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Envoyer un email</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">A propos de {{ $client->title. " " . $client->nom }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-user margin-r-5"></i> Nom & Prénom </strong>

                        <p class="text-muted">
                            {{ $client->title. " " . $client->nom. " ". $client->prenom  }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>

                        <p class="text-muted">{{ $client->adresse }}</p>

                        <hr>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
                        <li><a href="#retraits" data-toggle="tab">Retraits</a></li>
                        <li><a href="#commandes" data-toggle="tab">Commandes</a></li>
                        <li><a href="#versement" data-toggle="tab">Versements</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="timeline">
                            <ul class="timeline timeline-inverse">
                                <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                </li>
                                <li>
                                    <i class="fa fa-trash bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header">Retrais chemise </h3>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">voir</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </li>

                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="active tab-pane" id="retraits"></div>
                        <div class="active tab-pane" id="commandes"></div>
                        <div class="active tab-pane" id="versements"></div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="settings">
                            {!! Form::model($client, ['route'=>['clients.update', $client->id], 'method'=>'PUT']) !!}
                            <div class="box-body">
                                <div class="form-group @if ($errors->has('title')) has-error @endif">


                                    <select name="title" id="title" class="form-control">
                                        @if (\Illuminate\Support\Facades\Input::old('title') == $client->title)
                                            <option value="{{ $client->title }}" selected>{{ $client->title }}</option>
                                        @else
                                            <option value="{{ $client->title }}" {{ ($client->title == 'Mme') ? "SELECTED" : '' }}>Mme</option>
                                            <option value="{{ $client->title }}" {{ ($client->title == 'Mr') ? "SELECTED" : '' }}>Mr</option>
                                            <option value="{{ $client->title }}" {{ ($client->title == 'Mlle') ? "SELECTED" : '' }}>Mlle</option>
                                        @endif


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

                                <div class="form-group">
                                    <input type="checkbox" name="actif" value="" @if($client->actif==1) checked @endif>
                                    @if($client->actif == 1)
                                        Actif
                                    @else
                                        Inactif
                                    @endif
                                    <br>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->


@endsection


@section('scripts')

@endsection