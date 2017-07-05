@extends('layouts._layout-admin')

@section('title')

    Dépot Client

@endsection


@push('stylesheets')
{!! Html::style('css/select2.min.css') !!}
@endpush


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-lg-6">
                <h1>
                    Dépôt du Client
                    <small>{{ $client->nom. " ". $client->prenom }}</small>
                </h1>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">

            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                    @foreach($linges as $linge)
                       <div class="col-md-3 text-center" style="margin-bottom: 50px;">
                            <div style="border: 1px solid #eee;padding-bottom: 20px;padding-top: 20px;">
                                <img src="{{ asset('images/' . $linge->image) }}">
                                <p>{{ $linge->title ." | ". $linge->category->name}}</p>
                                <p><b>{{ $linge->price }} F CFA</b></p>
                                <p><a href="{{ route('depots.linge', ['id'=>$linge->id, 'clientID'=>$client->id]) }}" class="btn btn-success btn-xs">Ajouter</a></p>
                            </div>
                        </div>
                        
                    @endforeach
                </div>

                
                    </div>

                </div>

                <br>
                <br>
                <hr>

                
                
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->


@endsection

@push('scripts')
{!! Html::script('js/select2.min.js') !!}

@endpush