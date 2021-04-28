@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('auth.hi_name', ['name' =>auth()->user()->name]) }}
                        <div class="panel-body">
                            <center><a href="/posts/create" class="btn btn-primary">Create Post</a></center>
                            <h3>Your Blog Posts</h3>
                            @if(count($posts)>0)
                            <table class="table table-striped">
                                <tr>
                                    <td>Title</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                               
                                @foreach($posts as $posts)
                                    <tr>
                                        
                                        <td>{{$posts->title}}</td>
                                        <td></td>
                                        <td><a href="/posts/{{$posts->id}}/edit" class="btn btn-primary btn-sm float-right">Edit</a>
                                            {!!Form::open(['action'=> ['App\Http\Controllers\PostController@destroy',$posts->id],'metohd'=>'POST','class'=>'float-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete',['class' => 'btn btn-danger btn-sm'])}}
                                            {!!Form::close()!!}</td>
                                            
                                    </tr>
                                @endforeach
                               
                                       
                            </table> 
                            @else
                            <p>No post found</p>
                            @endif    
                        </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
