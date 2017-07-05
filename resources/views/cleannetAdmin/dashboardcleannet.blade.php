@extends('layouts.master_cleannet')

@section('title')

    Authentification Clean Net

@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="font-size: 24px;">Bienvenue sur Clean net</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('cleannet.list') }}" style="text-decoration: none;">
                <div class="jumbotron text-center">
                    <h2 style="font-size: 20px;">
                        Gestion des societés
                    </h2>
                </div>
            </a>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">

        </div>
    </div>
</div>

@endsection