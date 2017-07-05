@extends('layouts._layout-admin')

@section('title')

    Linges

@endsection



@section('content')
    <section class="content-header">
        <div class="row">
            <div class="col-lg-6">
                <h1>
                    Gestion du linge
                    <small>Liste des Linges</small>
                </h1>
            </div>
            <div class="col-lg-6 text-right">
                <div class="btn-group">
                    <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm">Nouveau linge</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-default btn-sm">Nouvelle Catégorie</a>
                </div>
            </div>
        </div>

    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @if($articles)
                                @foreach($articles as $article)
                                    <div class="col-md-3 text-center" style="margin-bottom: 10px;">
                                        <article style="border: 1px solid #eee;">
                                            <a href="{{ route('articles.edit', $article->id) }}">
                                                <img src="{{ asset('images/' . $article->image) }}" alt="Image"/>
                                            </a>
                                            <p>{{ $article->title  }} | {{$article->category->name}}</p>
                                            <p>{{ $article->status == 0 ? 'Inactif' : 'Actif' }}</p>
                                        </article>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection
