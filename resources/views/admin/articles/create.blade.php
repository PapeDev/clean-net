@extends('layouts._layout-admin')

@section('title')

    Creation article

@endsection

@section('content')
<section class="content-header">
    <div class="row">
        <div class="col-lg-6">
            <h1>
                Ajout d'un nouveau linge
            </h1>
        </div>
    </div>

</section>

   <section class="content">
       <div class="box">
           <div class="box-body">
               <div class="row">
                   <div class="col-md-12">
                       @if($errors->any())
                           <div class="alert alert-danger">
                               @foreach($errors->all() as $error)
                                   <p>{{ $error }}</p>
                               @endforeach
                           </div>
                       @endif
                   </div>
               </div>
               {!! Form::open(['route'=>'articles.store', 'method'=>'post', 'files' => true]) !!}
               <div class="row">
                   <div class="col-md-6">
                       <div class="form-group">
                           {!! Form::label('title', 'Titre') !!}
                           {!! Form::text('title',null, ['class'=>'form-control', 'placeholder'=>'Titre de mon article']) !!}
                       </div>
                       <div class="form-group">
                           {!! Form::label('price', 'Prix Unitaire') !!}
                           {!! Form::text('price',null, ['class'=>'form-control', 'placeholder'=>'Prix Unitaire']) !!}
                       </div>
                       <div class="form-group">
                           {!! Form::label('image', 'Image') !!}
                           <input type="file" name="image"/>
                       </div>

                       <div class="form-group">
                           {!! Form::label('category_id', 'Catégorie') !!}
                           <select class="form-control" name="category_id">
                               @foreach($categories as $item)
                                   <option value="{{$item->id}}">{{$item->name}}</option>
                               @endforeach
                           </select>
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
   </section>

@endsection