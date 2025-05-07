@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('family_active','active bg-gradient-secondary ')
@section('ftext','text-white')
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
        <form action="{{ route('familydetails.update', auth()->user()->app_id) }}" method="post" class="row g-3">
    @csrf
    @method('PATCH')

    <h1 class="mb-4">Family Details</h1>
    <input type="hidden" name="app_id" readonly id="app_id" value="{{auth()->user()->app_id}}">

    <!-- Father's Information Section -->
    <h4 class="text-primary mt-3">Father's Information</h4>
    <div class="col-md-4">
        <label for="father_full_name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="father_full_name" name="father_full_name" value="{{ $fd->father_full_name }}" required>
    </div>
    <div class="col-md-4">
        <label for="father_status" class="form-label">Status</label>
        <select class="form-select" id="father_status" name="father_status" required>
            <option value="{{ $fd->father_status }}">{{ $fd->father_status }}</option>
            <option value="Alive">Alive</option>
            <option value="Dead">Dead</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="father_address" class="form-label">Address</label>
        <input type="text" class="form-control" id="father_address" name="father_address" value="{{ $fd->father_address }}">
    </div>
    <div class="col-md-4">
        <label for="father_contact" class="form-label">Contact</label>
        <input type="text" class="form-control" id="father_contact" name="father_contact" value="{{ $fd->father_contact }}">
    </div>
    <div class="col-md-4">
        <label for="father_occupation" class="form-label">Occupation</label>
        <input type="text" class="form-control" id="father_occupation" name="father_occupation" value="{{ $fd->father_occupation }}">
    </div>

    <!-- Mother's Information Section -->
    <h4 class="text-primary mt-4">Mother's Information</h4>
    <div class="col-md-4">
        <label for="mother_full_name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="mother_full_name" name="mother_full_name" value="{{ $fd->mother_full_name }}" required>
    </div>
    <div class="col-md-4">
        <label for="mother_status" class="form-label">Status</label>
        <select class="form-select" id="mother_status" name="mother_status" required>
            <option value="{{ $fd->mother_status }}">{{ $fd->mother_status }}</option>
            <option value="Alive">Alive</option>
            <option value="Dead">Dead</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="mother_address" class="form-label">Address</label>
        <input type="text" class="form-control" id="mother_address" name="mother_address" value="{{ $fd->mother_address }}">
    </div>
    <div class="col-md-4">
        <label for="mother_contact" class="form-label">Contact</label>
        <input type="text" class="form-control" id="mother_contact" name="mother_contact" value="{{ $fd->mother_contact }}">
    </div>
    <div class="col-md-4">
        <label for="mother_occupation" class="form-label">Occupation</label>
        <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" value="{{ $fd->mother_occupation }}">
    </div>

    <!-- Guardian's Information Section -->
    <h4 class="text-primary mt-4">Guardian's Information (Optional)</h4>
    <div class="col-md-4">
        <label for="guardian_name" class="form-label">Name</label>
        <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{ $fd->guardian_name }}">
    </div>
    <div class="col-md-4">
        <label for="relation_to_applicant" class="form-label">Relation to Applicant</label>
        <input type="text" class="form-control" id="relation_to_applicant" name="relation_to_applicant" value="{{ $fd->relation_to_applicant }}">
    </div>
    <div class="col-md-4">
        <label for="guardian_address" class="form-label">Address</label>
        <input type="text" class="form-control" id="guardian_address" name="guardian_address" value="{{ $fd->guardian_address }}">
    </div>
    <div class="col-md-4">
        <label for="guardian_occupation" class="form-label">Occupation</label>
        <input type="text" class="form-control" id="guardian_occupation" name="guardian_occupation" value="{{ $fd->guardian_occupation }}">
    </div>
    <div class="col-md-4">
        <label for="guardian_phone_number" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="guardian_phone_number" name="guardian_phone_number" value="{{ $fd->guardian_phone_number }}">
    </div>

    <div class="col-md-12 text-center mt-4">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>

        <div class="col-md-4">
            @if (empty($pgd->app_id))
            <a class="btn btn-primary @yield('ptext')" href="{{ route('programdetails.create') }}">NEXT</a>
            @else
            <a class="btn btn-primary @yield('ptext')" href="{{ route('programdetails.edit', $pgd->app_id) }}">NEXT</a>
            @endif
            {{-- <button type="submit" class="btn btn-primary">Save and Continue</button> --}}
        </div>

    </div>

    @endsection