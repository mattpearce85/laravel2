@extends('app');

@section('content')
    <h1>Write a New Article</h1>
    
    <hr>
    
    {!! Form::open(['action' => '/articles']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>
        
        
        
        <div class="form-group">
            {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@stop