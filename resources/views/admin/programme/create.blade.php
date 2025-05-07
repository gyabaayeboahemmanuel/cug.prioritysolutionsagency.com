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

        <form action="{{ route('programme.store')}}" method="post">
        <p class="login-box-msg">@include('message.flash-message')</p>

            @csrf
            <div class="form-group">
                <label for="programme_title" class="form-label"> Programme title</label>
                <input type="text" name="programme_title" id="programme_title" class="form-control">
                @if($errors->has('programme_title'))
                    <span class="text-danger">{{$errors->first('programme_title')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <select name="programme_type" id="programme_type">
                    <option value="Undergraduate">
                        Undergraduate
                    </option>
                    <option value="Postgraduate">
                        Postgraduate
                    </option>
                </select>
                @if($errors->has('role'))
                <span class="text-danger">{{$errors->first('role')}}</span>
            @endif
        
        
        
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection