@extends('layouts.app')
@section('content')
<a href="/posts"><button type="button" class="btn btn-dark">Back</button></a>
    @csrf

    <h1><br>{{$posts ->title}}<br></h1> 
    <div>{{$posts->body}}</div>
    <hr><small>Written on {{$posts->created_at}} by {{$posts->user->name}}</small>    
    <hr>
    @if(!Auth::guest())
        @if(Auth::check())
            @if(Auth::user()->id == $posts->user_id)
                <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                {{-- {!!Form::open(['action'=> ['App\Http\Controllers\PostController@destroy',$posts->id],
                                'method'=>'POST','class'=>'btn btn-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}  --}}
                
                <form action="{{ route('posts.destroy', $posts->id)}}" method="POST" class="btn btn-right">
                    @csrf
                    {{method_field('DELETE')}}
                    
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                
                </form>
            @endif   
        @endif  
    @endif  
    
@endsection