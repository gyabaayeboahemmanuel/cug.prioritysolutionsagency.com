@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Personal Details for {{ $pd->first_name }} {{ $pd->surname }}</h1>
    </div>

    <section class="section">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.personal-details.update', $pd->app_id) }}" method="POST" enctype="multipart/form-data" class="card p-4">
            @csrf
            <div class="form-check mb-3">
    <input type="hidden" name="is_printed" value="0">
    <input class="form-check-input" type="checkbox" name="is_printed" id="is_printed" value="1" {{ old('is_printed', $pd->is_printed) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_printed">
        Printed and sent to Admissions Office
    </label>
</div>
            <div class="mb-3">
                <label class="form-label    ">Academic Year</label>
                <input name="academic_year" type="text" class="form-control" value="{{ old('academic_year', $pd->academic_year) }}" required>

            </div>
            <div class="mb-3">
                <label class="form-label">Form Type</label>
                <select name="form_type" class="form-select" required>
                    <option value="undergraduate" {{ old('form_type', $pd->form_type) == 'undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                    <option value="postgraduate" {{ old('form_type', $pd->form_type) == 'postgraduate' ? 'selected' : '' }}>Postgraduate</option>
                </select>
            </div>

            <input type="hidden" name="app_id" value="{{ $pd->app_id }}">

            <div class="mb-3">
                <label class="form-label">Surname</label>
                <input name="surname" type="text" class="form-control" value="{{ old('surname', $pd->surname) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input name="first_name" type="text" class="form-control" value="{{ old('first_name', $pd->first_name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Middle Name</label>
                <input name="middle_name" type="text" class="form-control" value="{{ old('middle_name', $pd->middle_name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select" required>
                    <option value="male" {{ old('gender', $pd->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $pd->gender) == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input name="date_of_birth" type="date" class="form-control" value="{{ old('date_of_birth', $pd->date_of_birth) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Place of Birth</label>
                <input name="place_of_birth" type="text" class="form-control" value="{{ old('place_of_birth', $pd->place_of_birth) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Region of Birth</label>
                <input name="region_of_birth" type="text" class="form-control" value="{{ old('region_of_birth', $pd->region_of_birth) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Hometown</label>
                <input name="hometown" type="text" class="form-control" value="{{ old('hometown', $pd->hometown) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Region of Hometown</label>
                <input name="region_of_hometown" type="text" class="form-control" value="{{ old('region_of_hometown', $pd->region_of_hometown) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Country</label>
                <input name="country" type="text" class="form-control" value="{{ old('country', $pd->country) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Marital Status</label>
                <select name="marital_status" class="form-select" required>
                    <option value="single" {{ old('marital_status', $pd->marital_status) == 'single' ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ old('marital_status', $pd->marital_status) == 'married' ? 'selected' : '' }}>Married</option>
                    <option value="divorced" {{ old('marital_status', $pd->marital_status) == 'divorced' ? 'selected' : '' }}>Divorced</option>
                    <option value="widowed" {{ old('marital_status', $pd->marital_status) == 'widowed' ? 'selected' : '' }}>Widowed</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Number of Children</label>
                <input name="number_of_children" type="number" class="form-control" value="{{ old('number_of_children', $pd->number_of_children) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Religion</label>
                <input name="religion" type="text" class="form-control" value="{{ old('religion', $pd->religion) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Place of Worship</label>
                <input name="worship_place" type="text" class="form-control" value="{{ old('worship_place', $pd->worship_place) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Is Employed?</label>
                <select name="is_employed" class="form-select" required>
                    <option value="yes" {{ old('is_employed', $pd->is_employed) == 'yes' ? 'selected' : '' }}>Yes</option>
                    <option value="no" {{ old('is_employed', $pd->is_employed) == 'no' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Occupation</label>
                <input name="occupation" type="text" class="form-control" value="{{ old('occupation', $pd->occupation) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Facility</label>
                <input name="facility" type="text" class="form-control" value="{{ old('facility', $pd->facility) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Intend to Finance Education</label>
                <input name="intend_finance_education" type="text" class="form-control" value="{{ old('intend_finance_education', $pd->intend_finance_education) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Avatar</label>
                <input name="avatar" type="file" class="form-control">
                @if ($pd->avatar)
                    <img src="{{ asset('storage/' . $pd->avatar) }}" alt="Avatar" width="100" height="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Personal Details</button>
        </form>
    </section>
</main>
@endsection
