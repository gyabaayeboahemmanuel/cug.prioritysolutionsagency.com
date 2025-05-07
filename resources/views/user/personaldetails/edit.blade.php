@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('personal_active','active bg-gradient-secondary ')
@section('ptext','text-white')

<div class="container mt-5">
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
    <form action="{{ route('personaldetails.update',auth()->user()->app_id )}}" method="post" class="row g-3"  enctype="multipart/form-data" >
        @csrf
        @method('PATCH') 

        
        <div class="col-md-4">
            <label for="academic_year" class="form-label">Academic Year</label>
            <input type="text" class="form-control" id="academic_year" value="{{ old('academic_year', $pd->academic_year) }}" name="academic_year" required>
        </div>

        <div class="col-md-4">
            <label for="form_type" class="form-label">Form Type</label>
            <select class="form-select" id="form_type" name="form_type" required>
                <option value="" disabled>Select Form Type</option>
                <option value="undergraduate" {{ old('form_type', $pd->form_type) == 'undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                <option value="postgraduate" {{ old('form_type', $pd->form_type) == 'postgraduate' ? 'selected' : '' }}>Postgraduate</option>
            </select>
        </div>
        <h1>Personal Details</h1>
        <input type="hidden" name="app_id" readonly id="app_id" value="{{auth()->user()->app_id}}">
        <div class="col-md-4">
            <label for="avatar" class="form-label">Upload Passport</label>
            <input type="file" class="form-control" id="avatar" name="avatar" >
        </div>
        <div class="col-md-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title"  placeholder="Mr./Mrs./Miss/Rev/Sr/"  value="{{ $pd-> title}}" name="title" required>
        </div>
        <div class="col-md-4">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" value="{{ $pd-> first_name}}" name="first_name" required>
        </div>
        <div class="col-md-4">
            <label for="surname" class="form-label">Surname Name</label>
            <input type="text" class="form-control" id="surname" name="surname" required    value="{{ $pd-> surname}}">
        </div>
        <div class="col-md-4">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name"  value="{{ $pd-> middle_name}}">
        </div>
        <div class="col-md-4">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required >
                
                {{-- <option value="{{$pd->gender}}">{{$pd->gender}}</option> --}}
            
                
                    <option @if ($pd->gender == 'Male') selected @endif>Male</option>
                
                    <option @if ($pd->gender == 'Female') selected @endif >Female</option>

        
                {{-- <option @if (old('gender') == "male") {{ 'selected' }} @endif value="male">Male</option>
                <option @if (old('gender') == "female") {{ 'selected' }} @endif value="female">Female</option> --}}
            </select>
        </div>
        <div class="col-md-4">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required  value="{{ $pd-> date_of_birth}}">
        </div>
        <div class="col-md-4">
            <label for="place_of_birth" class="form-label">Place of Birth</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth"  value="{{ $pd-> place_of_birth}}">
        </div>
        <div class="col-md-4">
            <label for="region_of_birth" class="form-label">Region of Birth</label>
            <select class="form-select" id="region_of_birth" name="region_of_birth" required >
                <option  value="{{ $pd-> region_of_birth}}">{{ $pd-> region_of_birth}}</option>
                <option>Ashanti Region</option>
                <option>Ahafo Region</option>
                <option>Bono Region</option>
                <option>Bono East Region</option>
                <option>Central Region</option>
                <option>Eastern Region</option>
                <option>North East Region</option>
                <option>Northern Region</option>
                <option>Oti Region</option>
                <option>Savannah Region</option>
                <option>Upper East Region</option>
                <option>Upper West Region</option>
                <option>Volta Region</option>
                <option>Western Region</option>
                <option>Western North Region</option>
                <option>Greater Accra Region</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="hometown" class="form-label">Hometown</label>
            <input type="text" class="form-control" id="hometown" name="hometown" value="{{ $pd-> hometown}}">
        </div>
        <div class="col-md-4">
            <label for="region_of_hometown" class="form-label">Region of Hometown</label>
            <select class="form-select" id="region_of_hometown" name="region_of_hometown" required >
                <option value="{{ $pd-> region_of_hometown}}">{{ $pd-> region_of_hometown}}</option>
                <option>Ashanti Region</option>
                <option>Ahafo Region</option>
                <option>Bono Region</option>
                <option>Bono East Region</option>
                <option>Central Region</option>
                <option>Eastern Region</option>
                <option>North East Region</option>
                <option>Northern Region</option>
                <option>Oti Region</option>
                <option>Savannah Region</option>
                <option>Upper East Region</option>
                <option>Upper West Region</option>
                <option>Volta Region</option>
                <option>Western Region</option>
                <option>Western North Region</option>
                <option>Greater Accra Region</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" required value="{{ $pd-> country}}">
        </div>
        <div class="col-md-6">
            <label for="marital_status" class="form-label">Marital Status</label>
            <select class="form-select" id="marital_status" name="marital_status" required >
                <option value="{{ $pd-> marital_status}}">{{ $pd-> marital_status}}</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="separated">Separated</option>
                <option value="divorced">Divorced</option>
                <option value="widowed">Widowed</option>

            </select>
        </div>
        <div class="col-md-6">
            <label for="number_of_children" class="form-label">Number of Children</label>
            <input type="number" class="form-control" id="number_of_children" name="number_of_children"  value="{{ $pd-> number_of_children}}">
        </div>
        <div class="col-md-6">
            <label for="religion" class="form-label">Religion</label>
            <select class="form-select" id="religion" name="religion" required >
                <option value="{{ $pd-> religion}}">{{ $pd-> religion}}</option>
                <option>Christianity</option>
                <option>Islam</option>
                <option>Traditional African Religions</option>
                <option>Hinduism</option>
                <option>Buddhism</option>
                <option>Bahá'í Faith</option>
                <option>Judaism</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="worship_place" class="form-label">Worship Place</label>
            <input type="text" class="form-control" id="worship_place" name="worship_place" required value="{{ $pd-> worship_place}}">
        </div>
        <div class="col-md-6">
            <label for="is_employed" class="form-label">Employed</label>
            <select class="form-select" id="is_employed" name="is_employed" >
                <option value="{{ $pd-> is_employed}}">{{ $pd-> is_employed}}</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $pd-> occupation}}">
        </div>
        <div class="col-md-4">
            <label for="facility" class="form-label">Facility</label>
            <input type="text" class="form-control" id="facility" name="facility" value="{{ $pd-> facility}}">
        </div>
        <div class="col-md-4">
            <label for="intend_finance_education" class="form-label">Intend Finance Education</label>
            <select class="form-select" id="intend_finance_education" name="intend_finance_education" >
                <option value="{{ $pd-> intend_finance_education}}">{{ $pd-> intend_finance_education}}</option>
                <option value="Parent/Guardian">Parent/Guardian</option>
                <option value="Myself">Myself</option>
                <option value="Scholarship">Scholarship</option>
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
        
    </form>
    <div class="col-md-4">
        @if (empty($cd->app_id))
        <a class="btn btn-primary @yield('ptext')" href="{{ route('contactdetails.create') }}">NEXT</a>
        @else
        <a class="btn btn-primary @yield('ptext')" href="{{ route('contactdetails.edit', $pd->app_id) }}">NEXT</a>
        @endif
        {{-- <button type="submit" class="btn btn-primary">Save and Continue</button> --}}
    </div>
</div>

@endsection