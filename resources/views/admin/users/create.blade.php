@extends('admin.components.base')
@section('title', 'CUG ADMISSIONS | Application ')
@section('extra-headers')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
@section ('content')

<div class="px-4">
    <div class="bg-white shadow-sm sm:rounded-lg">

        <form action="{{ route('admin.users.store')}}" method="post">
        <p class="login-box-msg">@include('message.flash-message')</p>

            @csrf
            <div class="form-group">
                <label for="name" class="form-label"> Name</label>
                <input type="text" name="name" id="name" class="form-control">
                @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="role" id="role" class="form-control">
                @if($errors->has('role'))
                <span class="text-danger">{{$errors->first('role')}}</span>
            @endif
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                @if($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
            </div>
        
            {{-- Password --}}
            <div class="col-md-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
            </div>
        
            {{--Confirmed Password
            <div class="col-md-4">
                <label for="password" class="form-label">Upload Photo</label>
                <input type="password" name="password_confirmation" id="password" class="form-control">
                @if(errors->has('password'))
                <span class="text-danger">{{errors->first('password')}}</span>
            @endif
            </div> --}}
        
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection
