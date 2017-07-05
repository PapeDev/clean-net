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
                </h1>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">

            <div class="box-body">
            @if(Session::has('linge'))

                <div class="row">

                    <div class="col-md-8 col-md-offset-2">
                        <table class="table table-striped">
                            <thead>
                                <th>Linge</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <td></td>
                            </thead>
                            <tbody>
                                @foreach($linges as $linge)
                                    <tr>
                                        <td>{{ $linge['item']['title'] }}</td>
                                        <td>{{ $linge['qty'] }}</td>
                                        <td>{{ $linge['price']}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning btn-xs">Diminuer(-1)</a>
                                                <a href="#" class="btn btn-danger btn-xs">Tout enlever</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <td colspan="2"><strong>Total : </strong></td>
                                <td><strong>{{ $totalPrice }}</strong></td>
                            </tfoot>
                            
                        </table>
                        <a href="#" class="btn btn-primary">Enregistrer</a>
                    </div>
                    
                </div>
            @endif

                
                
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