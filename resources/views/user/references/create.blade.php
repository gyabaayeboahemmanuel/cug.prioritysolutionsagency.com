@extends('user.components.base') 
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('reference_active', 'active bg-gradient-secondary')
@section('rtext', 'text-white')

<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('references.store') }}" method="post" class="row g-3 shadow p-4 bg-white rounded">
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">
        @csrf
        @method('POST')

        <h4 class="mb-4">References (Two Required)</h4>

        <!-- Reference 1 -->
        <div class="col-12">
            <h5>Reference 1</h5>
        </div>
        
        <div class="col-md-6">
            <label for="ref1_name" class="form-label">Reference 1 Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ref1_name" name="ref1_name" required>
        </div>

        <div class="col-md-6">
            <label for="ref1_organisation" class="form-label">Reference 1 Organisation</label>
            <input type="text" class="form-control" id="ref1_organisation" name="ref1_organisation">
        </div>

        <div class="col-md-6">
            <label for="ref1_position" class="form-label">Reference 1 Position</label>
            <input type="text" class="form-control" id="ref1_position" name="ref1_position">
        </div>

        <div class="col-md-6">
            <label for="ref1_phone" class="form-label">Reference 1 Phone <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="ref1_phone" name="ref1_phone" required>
        </div>

        <div class="col-md-6">
            <label for="ref1_email" class="form-label">Reference 1 Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="ref1_email" name="ref1_email" required>
        </div>

        <!-- Reference 2 -->
        <div class="col-12 mt-4">
            <h5>Reference 2</h5>
        </div>

        <div class="col-md-6">
            <label for="ref2_name" class="form-label">Reference 2 Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ref2_name" name="ref2_name" required>
        </div>

        <div class="col-md-6">
            <label for="ref2_organisation" class="form-label">Reference 2 Organisation</label>
            <input type="text" class="form-control" id="ref2_organisation" name="ref2_organisation">
        </div>

        <div class="col-md-6">
            <label for="ref2_position" class="form-label">Reference 2 Position</label>
            <input type="text" class="form-control" id="ref2_position" name="ref2_position">
        </div>

        <div class="col-md-6">
            <label for="ref2_phone" class="form-label">Reference 2 Phone <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="ref2_phone" name="ref2_phone" required>
        </div>

        <div class="col-md-6">
            <label for="ref2_email" class="form-label">Reference 2 Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="ref2_email" name="ref2_email" required>
        </div>

        <!-- Navigation Buttons -->
        <div class="col-12 d-flex justify-content-between mt-4">
            <a href="{{ route('employmentdetails.create') }}" class="btn btn-outline-secondary">
                <i class="material-icons">arrow_back</i> Previous
            </a>
            <button type="submit" class="btn btn-primary">
                Save and Continue <i class="material-icons">save</i>
            </button>
            <a href="{{ route('postgraduatedocuments.index') }}" class="btn btn-success">
                Next <i class="material-icons">arrow_forward</i>
            </a>
        </div>
    </form>
</div>

<script>
    // Validate phone numbers to be digits only
    $('#ref1_phone, #ref2_phone').on('keypress', function (e) {
        if (!/[0-9]/.test(String.fromCharCode(e.which))) {
            e.preventDefault();
        }
    });

    $('#ref1_phone, #ref2_phone').attr('maxlength', '15');
</script>
@endsection
