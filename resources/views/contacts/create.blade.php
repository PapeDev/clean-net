@extends('layouts.master')

@section('title')

    Contact

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-1">
            <h1>Get in Touch</h1>
            <p class="text-muted">Vous avez des questions, Vous avez besoin de notre logiciel contactez nous</p>
            <hr/>

            <form action="{{ route('contact') }}" method="post" novalidate>
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" name="name" id="name" placeholder="Votre nom" class="form-control" required/>
                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}

                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Adresse Email" class="form-control" required/>
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                    <label for="message" class="control-label sr-only">Message</label>
                    <textarea name="message" id="message" class="form-control" placeholder="Votre message" cols="10" rows="5"></textarea>
                    {!! $errors->first('message', '<span class="help-block">:message</span>') !!}

                </div>
                <div class="form-group">
                    <input type="submit" value="Envoyer" class="btn btn-block" style="background-color: rgba(4, 4, 4, 0.90);color: #fff;"/>
                </div>
            </form>
        </div>

    </div>


@endsection