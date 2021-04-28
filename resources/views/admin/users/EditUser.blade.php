@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">{{ __('User Info!') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('admin.user.update', ['user'=>$user->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user['name'] }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="myDIV" style="display:none">

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$user['first_name']}}" required autocomplete="first_name" autofocus>
                                                                                                                                                                                                       
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle name') }}</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" value="{{$user['middle_name']}}" name="middle_name" autofocus>
                                                                                                                                                                                                       
                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$user['last_name']}}" required autocomplete="last_name" autofocus>
                                                                                                                                                                                                       
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" only value="{{ $user['email'] }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="provinces" class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>

                            <div class="col-md-6">
                                <input id="provinces" type="text" class="form-control @error('provinces') is-invalid @enderror" name="provinces" value="{{$user['provinces']}}" required autocomplete="provinces" autofocus>
                                                                                                                                                                                                       
                                @error('provinces')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>
                                <div class="col-md-6"> 
                                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{$user['date_of_birth']}}">
                                </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update User') }}
                                </button>
                            </div>
                            
                        </div>
                        
                    
                    </form>
                    <a href="/admin/users" class="btn btn-danger">Back</a>
                    
                        <button class="btn btn-success float-right" id="toggleBtn"  onclick="hide_info()">Show Info</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script>


function hide_info() {

var x = document.getElementById("myDIV");
if (x.style.display === "none") {
  x.style.display = "block";
  toggleBtn.innerHTML = 'Hide info';
} else {
  x.style.display = "none";
  toggleBtn.innerHTML = 'Show info';
}
}


</script>


@endsection
