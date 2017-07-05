@extends('layouts._layout-admin')

@section('title')

    Edition linge

@endsection



@section('content')
<section class="content-header">
    <div class="row">
        <div class="col-lg-6">
            <h1>
                Edition linge
            </h1>
        </div>
    </div>

</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::model($article, ['route'=>['articles.update', $article->id], 'method'=>'PUT', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('title', 'Libellé du linge') !!}
                                {!! Form::text('title',null, ['class'=>'form-control', 'placeholder'=>'Titre de mon article']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', 'Prix Unitaire du linge') !!}
                                {!! Form::text('price',null, ['class'=>'form-control', 'placeholder'=>'Prix unitaire']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('category_id', 'Catégorie') !!}
                                {!! Form::select('category_id', $cats, null, ['class'=>'form-control']) !!}

                            </div>



                        </div>

                        <div class="col-md-6">
                            <img src="{{ asset('images/' . $article->image) }}" alt="Image"/>
                            <p>{{ $article->title }} {{ $article->category->name }}</p>
                            <div class="form-group">
                                {!! Form::label('image', 'Image') !!}
                                <input type="file" name="image"/>
                            </div>
                        </div>
                    </div>
                    <hr/>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
