@extends('layouts._layout-admin')
@section('title')

    Consultation article

@endsection

@section('content')
<section class="content-header">
    <div class="row">
        <div class="col-lg-6">
            <h1>
                Consultation linge {{ $article->title }}
            </h1>
        </div>
    </div>

</section>
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-3 text-center" style="border: 1px solid #eee;">
                    <p><img src="{{ asset('images/' . $article->image) }}" alt="Image"/></p>
                    <h2>{{ $article->title }}</h2>
                </div>
                <div class="col-md-4 text-left">
                    <p style="font-size: 18px;"><span style="border-bottom: 1px solid #000;">Prix</span> : <strong>{{ $article->price }}</strong></p>
                    <div class="btn-group" style="top: 2em;">
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm">Modifier le linge</a>
                        <a href="#" class="btn btn-danger btn-sm">Supprimer le linge</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                </div>
            </div>


        </div>
    </div>
</section>

@endsection