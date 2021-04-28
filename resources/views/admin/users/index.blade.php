@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Manage Users') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Province</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($users as $user)
                                  <tr>
                                      <th>{{ $user->name }}</th>
                                      <th>{{ $user->email }}</th>
                                      <th>{{ $user->provinces }}</th>
                                      <th>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray() )}}</th>
                                      <th>
                                        <a href="{{ route('admin.users.edit', $user->id )}}" class="float-left btn btn-primary btn-sm" >Edit Role</a>
                                          <a href="{{route('admin.user.show', $user->id)}}" class="float-left btn btn-success btn-sm">Edit User</a>
                                        <form action="{{ route('admin.users.destroy', $user->id)}}" method="POST" class="float-left">
                                              @csrf
                                              {{method_field('DELETE')}}
                                              
                                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                          
                                        </form>
                                      </th>
                                    </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{$users->links()}}
                    </div>
              
            </div>  
        </div>
    </div>
</div>


@endsection
