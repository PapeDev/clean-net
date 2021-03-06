@extends('layouts._layout-admin')

@section('title')

    Clients

@endsection



@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-lg-6">
                <h1>
                    Clients
                    <small>Liste des clients</small>
                </h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Nouveau client</a>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">

            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <td>#</td>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($clients)

                        @foreach($clients as $client)
                            <tr>
                                <td>@if($client->actif == 1) <a
                                            href="{{ route('clients.checkActif', $client->id) }}"> <i class="fa fa-check-circle text-success"></i></a> @else
                                        <a href="{{ route('clients.checkActif', $client->id) }}"> <i class="fa fa-circle-o text-danger"></i></a> @endif</td>
                                <td><a href="{{ route('clients.show', $client->id) }}">{{ $client->nom }}</a></td>
                                <td>{{ $client->prenom }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->tel  }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-success mce-btn-small btn-sm"> Versement</a>
                                        <a href="{{ route('depots.create', $client->id) }}" class="btn btn-default mce-btn-small btn-sm"> Dépôt</a>
                                        <a href="#" class="btn btn-danger mce-btn-small btn-sm"> Retrait</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->


@endsection

@push('scripts')
<script src="test"></script>
@endpush