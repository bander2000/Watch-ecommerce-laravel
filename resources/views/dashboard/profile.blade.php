@extends('dashboard.index')

@section('content')
 
<div class="row">
  <div class="col-md-12">

    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Simple Table</h4>
      </div>
      
      <div class="card-body">

        

            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
    
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul >
                        @foreach ($errors->all() as $error)
                            <li >{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


      <form action="{{ route('users.update') }}" method="POST">
        @method('patch')
        @csrf
        <div class="my-4">
            <input id="name" type="text" name="name" 
            value="{{ old('name', $user->name) }}" class="form-control" placeholder="Name" required>
        </div>
        <div class="my-4">
            <input id="email" type="email" name="email" 
            value="{{ old('email', $user->email) }}" class="form-control" placeholder="Email" required>
        </div>
    
        <div class="my-4">
            <input id="password" type="password" 
            name="password" class="form-control" placeholder="Password" />
            <div class="mt-2">Leave password blank to keep current password</div>
        </div>
        <div class="my-4">
            <input id="password-confirm" type="password" class="form-control"
            name="password_confirmation" placeholder="Confirm Password">
        </div>
        <div class="my-4">
            <button type="submit" class="btn btn-success">Update Profile</button>
        </div>
    </form>
      
         
          
        
      
      
      
      
        </div>
    </div>
  </div>
</div>

      
    
@endsection