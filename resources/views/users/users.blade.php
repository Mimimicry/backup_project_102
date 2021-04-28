@extends('layouts.app')

@section('content')
    
        <table style="width:800px; text-align-left">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Province</th>                    
                    <th>Email</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->provinces}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{route('viewuser',$user->id)}}">Manage User</a></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
   
@endsection