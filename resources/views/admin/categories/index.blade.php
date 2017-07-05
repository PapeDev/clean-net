@extends('layouts._layout-admin')
@section('title')
    Categories
@endsection

@section('content')
 <section class="content">
     <div class="box">
         <div class="box-body">
             <div class="row">
                 <div class="col-md-12">
                     <h1>Categories</h1>
                 </div>
             </div>

             <div class="row">
                 <div class="col-md-8">
                     <table class="table table-striped">
                         <thead>
                         <tr>
                             <td>ID</td>
                             <td>Name</td>
                             <td>Crée le</td>
                             <td>Actions</td>
                         </tr>
                         </thead>
                         <tbody class="category">
                         @if($categories)
                             @foreach($categories as $category)
                                 <tr class="interaction">
                                     <td>{{ $category->id }}</td>
                                     <td><a class="editajax" href="#">{{ $category->name  }}</a></td>
                                     <td>{{ $category->created_at ? $category->created_at : 'Pas de date trouvé' }}</td>
                                     <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm">Edit</a></td>
                                     <td>
                                         {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]])!!}
                                         {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                         {!! Form::close() !!}
                                     </td>
                                 </tr>
                             @endforeach
                         @endif
                         </tbody>
                     </table>
                 </div>

                 {{--Form category--}}
                 <div class="col-md-4">
                     @if($errors->any())
                         <div class="alert alert-danger">
                             @foreach($errors->all() as $error)
                                 <p>{{ $error }}</p>
                             @endforeach
                         </div>
                     @endif
                     {!! Form::open(['route'=>'categories.store', 'method' => 'post']) !!}
                     <div class="form-group">
                         {!! Form::label('name', 'Nom de la categorie') !!}
                         {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Entrez le nom de la catégorie']) !!}
                     </div>
                     {!! Form::submit('Ajouter', ['class'=>'btn btn-primary btn-block']) !!}
                     {!! Form::close() !!}
                         <br/>
                         <div>
                             <a class="btn btn-block btn-default" href="{{ route('articles.index') }}"> Voir les linges</a>
                         </div>
                 </div>

             </div>
         </div>
     </div>
 </section>


@endsection