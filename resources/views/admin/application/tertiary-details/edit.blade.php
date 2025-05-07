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
    <h1>Edit Personal Details for {{ $pd->first_name }} {{ $pd->surname }}</h1>
    <form action="{{ route('admin.personal-details.update', $pd->app_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="app_id" readonly id="app_id" value="{{$pd->app_id}}">

        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname', $pd->surname) }}" required>
        </div>

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $pd->first_name) }}" required>
        </div>

        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ old('middle_name', $pd->middle_name) }}">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="male" {{ old('gender', $pd->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $pd->gender) == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth', $pd->date_of_birth) }}" required>
        </div>

        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="{{ old('place_of_birth', $pd->place_of_birth) }}">
        </div>

        <div class="form-group">
            <label for="region_of_birth">Region of Birth</label>
            <input type="text" name="region_of_birth" id="region_of_birth" class="form-control" value="{{ old('region_of_birth', $pd->region_of_birth) }}">
        </div>

        <div class="form-group">
            <label for="hometown">Hometown</label>
            <input type="text" name="hometown" id="hometown" class="form-control" value="{{ old('hometown', $pd->hometown) }}">
        </div>

        <div class="form-group">
            <label for="region_of_hometown">Region of Hometown</label>
            <input type="text" name="region_of_hometown" id="region_of_hometown" class="form-control" value="{{ old('region_of_hometown', $pd->region_of_hometown) }}">
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $pd->country) }}" required>
        </div>

        <div class="form-group">
            <label for="marital_status">Marital Status</label>
            <select name="marital_status" id="marital_status" class="form-control" required>
                <option value="single" {{ old('marital_status', $pd->marital_status) == 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ old('marital_status', $pd->marital_status) == 'married' ? 'selected' : '' }}>Married</option>
                <option value="divorced" {{ old('marital_status', $pd->marital_status) == 'divorced' ? 'selected' : '' }}>Divorced</option>
                <option value="widowed" {{ old('marital_status', $pd->marital_status) == 'widowed' ? 'selected' : '' }}>Widowed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="number_of_children">Number of Children</label>
            <input type="number" name="number_of_children" id="number_of_children" class="form-control" value="{{ old('number_of_children', $pd->number_of_children) }}">
        </div>

        <div class="form-group">
            <label for="religion">Religion</label>
            <input type="text" name="religion" id="religion" class="form-control" value="{{ old('religion', $pd->religion) }}">
        </div>

        <div class="form-group">
            <label for="worship_place">Place of Worship</label>
            <input type="text" name="worship_place" id="worship_place" class="form-control" value="{{ old('worship_place', $pd->worship_place) }}">
        </div>

        <div class="form-group">
            <label for="is_employed">Is Employed?</label>
            <select name="is_employed" id="is_employed" class="form-control" required>
                <option value="yes" {{ old('is_employed', $pd->is_employed) == 'yes' ? 'selected' : '' }}>Yes</option>
                <option value="no" {{ old('is_employed', $pd->is_employed) == 'no' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" name="occupation" id="occupation" class="form-control" value="{{ old('occupation', $pd->occupation) }}">
        </div>

        <div class="form-group">
            <label for="facility">Facility</label>
            <input type="text" name="facility" id="facility" class="form-control" value="{{ old('facility', $pd->facility) }}">
        </div>

        <div class="form-group">
            <label for="intend_finance_education">Intend to Finance Education</label>
            <input type="text" name="intend_finance_education" id="intend_finance_education" class="form-control" value="{{ old('intend_finance_education', $pd->intend_finance_education) }}">
        </div>

        <div class="form-group">
            <label for="avatar">Upload Avatar</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
            @if ($pd->avatar)
                <img src="{{ asset('storage/' . $pd->avatar) }}" alt="Avatar" width="100" height="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Personal Details</button>
    </form>
@endsection
