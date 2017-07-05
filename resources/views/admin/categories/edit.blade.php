@extends('layouts._layout-admin')

@section('title')

    Edition d'une categorie

@endsection



@section('content')
   <div class="box">
       <div class="box-body">
           <div class="row">
               <div class="col-md-12">
                   <h1>Edition d'une categorie</h1>
               </div>
           </div>

           <div class="row">
               <div class="col-md-4">
                   {!! Form::model($category, ['route'=> array('categories.update', $category->id), 'method' => 'PUT']) !!}
                   <div class="form-group">
                       {!! Form::label('name', 'Name') !!}
                       {!! Form::text('name', null, ['class' => 'form-control']) !!}
                   </div>
                   {!! Form::submit('Modifier', ['class'=>'form-control']) !!}
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>


@endsection