@extends('layouts.admin')

@section('content')
@if (session('success'))
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
    <h1>Edit Contact Details for {{ $cd->app_id }}</h1>
    <form action="{{ route('admin.contact-details.update', $cd->app_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="app_id" readonly id="app_id" value="{{$cd->app_id}}">

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $cd->phone_number) }}" required>
        </div>

        <div class="form-group">
            <label for="online_number">Online Number</label>
            <input type="text" name="online_number" id="online_number" class="form-control" value="{{ old('online_number', $cd->online_number) }}">
        </div>

        <div class="form-group">
            <label for="email_address">Email Address</label>
            <input type="email" name="email_address" id="email_address" class="form-control" value="{{ old('email_address', $cd->email_address) }}" required>
        </div>

        <div class="form-group">
            <label for="postal_address">Postal Address</label>
            <input type="text" name="postal_address" id="postal_address" class="form-control" value="{{ old('postal_address', $cd->postal_address) }}" required>
        </div>

        <div class="form-group">
            <label for="city_of_post_office_box">City of Post Office Box</label>
            <input type="text" name="city_of_post_office_box" id="city_of_post_office_box" class="form-control" value="{{ old('city_of_post_office_box', $cd->city_of_post_office_box) }}">
        </div>

        <div class="form-group">
            <label for="residential_address">Residential Address</label>
            <input type="text" name="residential_address" id="residential_address" class="form-control" value="{{ old('residential_address', $cd->residential_address) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Contact Details</button>
    </form>
@endsection
