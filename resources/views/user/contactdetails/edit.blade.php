@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('contact_active','active bg-gradient-secondary ')
@section('ctext','text-white')
    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('contactdetails.update', auth()->user()->app_id) }}" method="post" class="row g-3">
        <input type="hidden" name="app_id" readonly id="app_id" value="{{auth()->user()->app_id}}">
           
            @csrf
            @method('PATCH') 
            <h1>Contact Details</h1>
            <div class="col-md-4">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone_number"  value="{{ $cd-> phone_number}}" name="phone_number" required>
            </div>
            <div class="col-md-4">
                <label for="online_number" class="form-label">Online Number</label>
                <input type="tel" class="form-control" id="online_number"  value="{{ $cd-> online_number}}"  name="online_number" required>
            </div>
            <div class="col-md-4">
                <label for="email_address" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email_address" value="{{ $cd-> email_address}}" name="email_address">
            </div>
            <div class="col-md-4">
                <label for="postal_address" class="form-label">Postal Address</label>
                <input type="text" class="form-control"  value="{{ $cd-> postal_address}}"  id="postal_address" name="postal_address" required>
            </div>
            <div class="col-md-4">
                <label for="city_of_post_office_box" class="form-label">City of Post Office Box</label>
                <input type="text" class="form-control"  value="{{ $cd-> city_of_post_office_box}}"  id="city_of_post_office_box" name="city_of_post_office_box">
            </div>
            <div class="col-md-4">
                <label for="residential_address" class="form-label">Residential Address</label>
                <input type="text" class="form-control" value="{{ $cd-> residential_address}}" id="residential_address" name="residential_address">
            </div>
            <div class="col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
        <div class="col-md-4">
            @if (empty($fd->app_id))
            <a class="btn btn-primary @yield('ptext')" href="{{ route('familydetails.create') }}">NEXT</a>
            @else
            <a class="btn btn-primary @yield('ptext')" href="{{ route('familydetails.edit', $pd->app_id) }}">NEXT</a>
            @endif
            {{-- <button type="submit" class="btn btn-primary">Save and Continue</button> --}}
        </div>
    </div>
    

    @endsection