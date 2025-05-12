@extends('user.components.base')

@section('application_active', 'active bg-gradient-primary')
@section('attached_active', 'active bg-gradient-secondary')
@section('attext', 'text-white')

@section('content')
<div class="container mt-5">
    @if (session('success'))
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

    <form action="{{ route('attacheddocuments.store') }}" method="POST" class="row g-3 shadow p-4 bg-white rounded" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="app_id" value="{{ auth()->user()->app_id }}">

        <h4 class="mb-4">Upload Attached Documents</h4>

        <!-- Ghana Card -->
        <div class="col-md-6">
            <label for="ghanacard_upload_url" class="form-label">Ghana Card</label>
            <input type="file" 
                   class="form-control" 
                   id="ghanacard_upload_url" 
                   name="ghanacard_upload_url"
                   accept=".pdf,.jpg,.jpeg,.png">
            <div class="form-text">Max size: 2MB (PDF, JPG, PNG)</div>
        </div>

        <!-- Birth Certificate -->
        <div class="col-md-6">
            <label for="birthcert_upload_url" class="form-label">Birth Certificate</label>
            <input type="file" 
                   class="form-control" 
                   id="birthcert_upload_url" 
                   name="birthcert_upload_url"
                   accept=".pdf,.jpg,.jpeg,.png">
            <div class="form-text">Max size: 2MB (PDF, JPG, PNG)</div>
        </div>

        <!-- Signature -->
        <div class="col-md-6">
            <label for="signature" class="form-label">Signature <span class="text-danger">*</span></label>
            <input type="file" 
                   class="form-control" 
                   id="signature" 
                   name="signature" 
                   required
                   accept=".jpg,.jpeg,.png">
            <div class="form-text">Required. Max size: 1MB (JPG, PNG)</div>
        </div>

        <!-- WASSCE Result -->
        <div class="col-md-6">
            <label for="wassce_upload_url" class="form-label">WASSCE Result</label>
            <input type="file" 
                   class="form-control" 
                   id="wassce_upload_url" 
                   name="wassce_upload_url"
                   accept=".pdf,.jpg,.jpeg,.png">
            <div class="form-text">Max size: 2MB (PDF, JPG, PNG)</div>
        </div>

        <!-- Second WASSCE Result -->
        <div class="col-md-4">
            <label for="wassce2_upload_url" class="form-label">Second WASSCE Result</label>
            <input type="file" 
                   class="form-control" 
                   id="wassce2_upload_url" 
                   name="wassce2_upload_url"
                   accept=".pdf,.jpg,.jpeg,.png">
            <div class="form-text">Max size: 2MB (PDF, JPG, PNG)</div>
        </div>

        <!-- Third WASSCE Result -->
        <div class="col-md-4">
            <label for="wassce3_upload_url" class="form-label">Third WASSCE Result</label>
            <input type="file" 
                   class="form-control" 
                   id="wassce3_upload_url" 
                   name="wassce3_upload_url"
                   accept=".pdf,.jpg,.jpeg,.png">
            <div class="form-text">Max size: 2MB (PDF, JPG, PNG)</div>
        </div>

        <!-- Tertiary Certificate -->
        <div class="col-md-4">
            <label for="tertiarycert_upload_url" class="form-label">Tertiary Institution Certificate</label>
            <input type="file" 
                   class="form-control" 
                   id="tertiarycert_upload_url" 
                   name="tertiarycert_upload_url"
                   accept=".pdf,.jpg,.jpeg,.png">
            <div class="form-text">Max size: 2MB (PDF, JPG, PNG)</div>
        </div>

        <!-- Navigation Buttons -->
        <div class="col-12 d-flex justify-content-between mt-4">
            <!-- Previous Button -->
            <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Previous
            </a>

            <!-- Save Button -->
            <button type="submit" class="btn btn-primary">
                Save Documents <i class="material-icons">save</i>
            </button>

            <!-- Next Button -->
            <button type="submit" class="btn btn-success" name="save_and_continue" value="1">
                Save & Continue <i class="material-icons">arrow_forward</i>
            </button>
        </div>
    </form>
</div>

<!-- File Size Validation Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInputs = document.querySelectorAll('input[type="file"]');
        
        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                const file = this.files[0];
                const maxSize = this.id === 'signature' ? 1024 * 1024 : 2 * 1024 * 1024; // 1MB or 2MB
                
                if (file && file.size > maxSize) {
                    alert(`File size exceeds ${maxSize/(1024*1024)}MB limit`);
                    this.value = '';
                }
            });
        });
    });
</script>
@endsection