@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('family_active','active bg-gradient-secondary ')
@section('ftext','text-white')

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('familydetails.store') }}" method="post" class="row g-3 shadow p-4 bg-white rounded">
        @csrf
        @method('POST')

        <h4 class="mb-4">Family Details</h4>
        <input type="hidden" name="app_id" id="app_id" value="{{ auth()->user()->app_id }}">

        <!-- Father's Information -->
        <h5 class="text-primary mt-3">Father's Information</h5>
        <div class="col-md-4">
            <label for="father_full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="father_full_name" name="father_full_name" required>
        </div>
        <div class="col-md-4">
            <label for="father_status" class="form-label">Status</label>
            <select class="form-select" id="father_status" name="father_status" required>
                <option value="">Select Father's Status</option>
                <option value="Alive">Alive</option>
                <option value="Dead">Dead</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="father_address" class="form-label">Address</label>
            <input type="text" class="form-control" id="father_address" name="father_address">
        </div>
        <div class="col-md-4">
            <label for="father_contact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="father_contact" name="father_contact">
        </div>
        <div class="col-md-4">
            <label for="father_occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control" id="father_occupation" name="father_occupation">
        </div>

        <!-- Mother's Information -->
        <h5 class="text-primary mt-4">Mother's Information</h5>
        <div class="col-md-4">
            <label for="mother_full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="mother_full_name" name="mother_full_name" required>
        </div>
        <div class="col-md-4">
            <label for="mother_status" class="form-label">Status</label>
            <select class="form-select" id="mother_status" name="mother_status" required>
                <option value="">Select Mother's Status</option>
                <option value="Alive">Alive</option>
                <option value="Dead">Dead</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="mother_address" class="form-label">Address</label>
            <input type="text" class="form-control" id="mother_address" name="mother_address">
        </div>
        <div class="col-md-4">
            <label for="mother_contact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="mother_contact" name="mother_contact">
        </div>
        <div class="col-md-4">
            <label for="mother_occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control" id="mother_occupation" name="mother_occupation">
        </div>

        <!-- Guardian's Information -->
        <h5 class="text-primary mt-4">Guardian's Information <small class="text-muted">(Optional)</small></h5>
        <div class="col-md-4">
            <label for="guardian_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="guardian_name" name="guardian_name">
        </div>
        <div class="col-md-4">
            <label for="relation_to_applicant" class="form-label">Relation to Applicant</label>
            <input type="text" class="form-control" id="relation_to_applicant" name="relation_to_applicant">
        </div>
        <div class="col-md-4">
            <label for="guardian_address" class="form-label">Address</label>
            <input type="text" class="form-control" id="guardian_address" name="guardian_address">
        </div>
        <div class="col-md-4">
            <label for="guardian_occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control" id="guardian_occupation" name="guardian_occupation">
        </div>
        <div class="col-md-4">
            <label for="guardian_phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="guardian_phone_number" name="guardian_phone_number">
        </div>

        <!-- Navigation Buttons -->
        <div class="col-12 d-flex justify-content-between mt-4">
            <!-- Previous Button -->
            <a href="{{ route('contactdetails.edit', auth()->user()->app_id) }}" class="btn btn-outline-secondary">
                <i class="material-icons">arrow_back</i> Previous
            </a>

            <!-- Save and Continue Button -->
            <button type="submit" class="btn btn-primary">
                Save and Continue <i class="material-icons">save</i>
            </button>

            <!-- Next Button -->
            <a class="btn btn-success" href="{{ route('programdetails.create') }}">
                Next <i class="material-icons">arrow_forward</i>
            </a>
        </div>
    </form>
</div>

@endsection
