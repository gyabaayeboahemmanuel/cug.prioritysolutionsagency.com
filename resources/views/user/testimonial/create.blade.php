@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('contact_active', 'active bg-gradient-secondary')
@section('ctext', 'text-white')

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

    <form action="{{ route('contactdetails.store') }}" method="post" class="row g-3 shadow p-4 bg-white rounded">
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">
        @csrf
        @method('POST')

        <h4 class="mb-4">Contact Details</h4>

        <!-- Phone Number -->
        <div class="col-md-4">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="tel" 
                   class="form-control" 
                   id="phone_number" 
                   placeholder="e.g., +233 24 123 4567" 
                   name="phone_number" 
                   required>
        </div>

        <!-- Online Number -->
        <div class="col-md-4">
            <label for="online_number" class="form-label">Online Number (WhatsApp)</label>
            <input type="tel" 
                   class="form-control" 
                   id="online_number" 
                   placeholder="e.g., +233 55 123 4567" 
                   name="online_number" 
                   required>
        </div>

        <!-- Email Address -->
        <div class="col-md-4">
            <label for="email_address" class="form-label">Email Address</label>
            <input type="email" 
                   class="form-control" 
                   id="email_address" 
                   placeholder="e.g., example@gmail.com" 
                   name="email_address" 
                   required>
        </div>

        <!-- Postal Address -->
        <div class="col-md-4">
            <label for="postal_address" class="form-label">Postal Address</label>
            <input type="text" 
                   class="form-control" 
                   id="postal_address" 
                   placeholder="e.g., P.O. Box 123, Accra" 
                   name="postal_address" 
                   required>
        </div>

        <!-- City of Post Office Box -->
        <div class="col-md-4">
            <label for="city_of_post_office_box" class="form-label">City of Post Office Box</label>
            <input type="text" 
                   class="form-control" 
                   id="city_of_post_office_box" 
                   placeholder="e.g., Kumasi, Sunyani" 
                   name="city_of_post_office_box">
        </div>

        <!-- Residential Address -->
        <div class="col-md-4">
            <label for="residential_address" class="form-label">Residential Address</label>
            <input type="text" 
                   class="form-control" 
                   id="residential_address" 
                   placeholder="e.g., House No. 12, Adenta, Accra" 
                   name="residential_address">
        </div>

        <!-- Navigation Buttons -->
        <div class="col-12 d-flex justify-content-between mt-4">
            <!-- Previous Button -->
            <a href="{{ route('personaldetails.edit', auth()->user()->app_id) }}" class="btn btn-outline-secondary">
                <i class="material-icons">arrow_back</i> Previous
            </a>

            <!-- Save Changes Button -->
            <button type="submit" class="btn btn-primary">
                Save and Continue <i class="material-icons">save</i>
            </button>

            <!-- Next Button -->
            @if (empty($fd->app_id))
                <a class="btn btn-success" href="{{ route('familydetails.create') }}">
                    Next <i class="material-icons">arrow_forward</i>
                </a>
            @else
                <a class="btn btn-success" href="{{ route('familydetails.edit', auth()->user()->app_id) }}">
                    Next <i class="material-icons">arrow_forward</i>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Input Masking for Phone Numbers -->
<script>
    $(document).ready(function() {
        $('#phone_number, #online_number').on('keypress', function(e) {
            // Allow only numbers
            if (!/[0-9]/.test(String.fromCharCode(e.which))) {
                e.preventDefault();
            }
        });

        $('#phone_number, #online_number').attr('maxlength', '15');
    });
</script>

@endsection
