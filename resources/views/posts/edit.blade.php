@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-primary">Back</a>
<hr>    
    <h1>Edit Post</h1>
    {!! Form::open(['action' =>['App\Http\Controllers\PostController@update', $posts->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $posts->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $posts->body, ['class' => 'form-control', 'placeholder' => 'Body'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection