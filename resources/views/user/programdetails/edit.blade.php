@extends('user.components.base')
@section('application_active', 'active')
@section('content')
@section('programme_active', 'active')
@section('pgtext', 'text-white')

<div class="container mt-5">
    <!-- Bootstrap Alerts -->
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

    <!-- Form to Update Program Details -->
    <form action="{{ route('programdetails.update', auth()->user()->app_id) }}" method="post" class="row g-3 shadow p-4 bg-white rounded">
        @csrf
        @method('PATCH') 

        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">

        <h4 class="mb-3">Programme Details</h4>

        <!-- Admission Period -->
        <div class="col-md-6">
            <label for="program" class="form-label">Select Admission Period</label>
            <select class="form-select" id="program" name="program" required>
                <option value="{{ $pgd->program }}" selected>{{ $pgd->program }}</option>
                <option value="August/September">August/September (Reg/Wk)</option>
                <option value="January/February">January/February (Reg/Wk)</option>
                <option value="June/July">June/July (Sandwich)</option>
            </select>
        </div>
        <div class="col-md-6">
    <label for="mature_applicant" class="form-label">Mature Applicant</label>
    <select class="form-select" id="mature_applicant" name="mature_applicant">
        <option value="" {{ $pgd->mature_applicant == null ? 'selected' : '' }}>Select Option</option>
        <option value="Yes" {{ $pgd->mature_applicant == 'Yes' ? 'selected' : '' }}>Yes</option>
        <option value="No" {{ $pgd->mature_applicant == 'No' ? 'selected' : '' }}>No</option>
    </select>
</div>

        <!-- Program of Choice -->
        <div class="col-md-6">
            <label for="program_of_choice" class="form-label">Program of Choice</label>
            <select class="form-select select2" id="program_of_choice" name="program_of_choice" required>
                @foreach($programmes as $programme)
                    <option value="{{ $programme->programme_title }}" {{ $programme->programme_title == $pgd->program_of_choice ? "selected" : "" }}>
                        {{ $programme->programme_title }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Streams -->
        <div class="col-md-6">
            <label for="streams" class="form-label">Streams</label>
            <select class="form-select" id="streams" name="streams" required aria-label="Select Stream">
                <option value="Weekend" {{ ($pgd->streams == 'Weekend' || $pgd->streams == 'Weekend Student') ? 'selected' : '' }}>Weekend</option>
                <option value="Regular" {{ ($pgd->streams == 'Regular' || $pgd->streams == 'Regular Student') ? 'selected' : '' }}>Regular</option>
                <option value="Sandwich" {{ $pgd->streams == 'Sandwich' ? 'selected' : '' }}>Sandwich</option>
            </select>
        </div>

        <!-- Navigation Buttons -->
        <div class="col-12 d-flex justify-content-between mt-4">
            <!-- Previous Button -->
            <a href="{{ route('familydetails.edit', $pgd->app_id) }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Previous
            </a>

            <!-- Save Changes Button -->
            <button type="submit" class="btn btn-primary">
                Save Changes <i class="fas fa-save"></i>
            </button>

            <!-- Next Button -->
            @if (empty($ad->app_id))
                <a class="btn btn-success" href="{{ route('academicdetails.create') }}">
                    Next <i class="fas fa-arrow-right"></i>
                </a>
            @else
                <a class="btn btn-success" href="{{ route('academicdetails.edit', $ad->app_id) }}">
                    Next <i class="fas fa-arrow-right"></i>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        console.log("jQuery Loaded: " + (typeof jQuery !== 'undefined'));
        console.log("Select2 Loaded: " + (typeof $.fn.select2 !== 'undefined'));

        if ($.fn.select2) {
            console.log("Initializing Select2...");
            $('select.select2').select2({
                placeholder: "Search and select a Programme",
                allowClear: true,
                theme: "bootstrap-5",
                language: {
                    noResults: function() {
                        return "No Programme found";
                    }
                }
            });
        } else {
            console.error("Select2 failed to load.");
        }
    });
</script>

@endsection
