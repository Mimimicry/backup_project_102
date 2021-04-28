@extends('layouts.app')

@section('content')
<h1>
    {{$users->name}}
    {{$users->email}}
    {{$users->provinces}}
</h1>   

<form action="{{route('deleteuser',$users->id,)}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Delete user</button>
</form>
@endsection