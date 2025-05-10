@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('programme_active', 'active bg-gradient-secondary')
@section('pgtext','text-white')

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

    <form action="{{ route('programdetails.store') }}" method="post" class="row g-3 shadow p-4 bg-white rounded">
        @csrf
        @method('POST')
        <input type="hidden" name="app_id" readonly id="app_id" value="{{auth()->user()->app_id}}">

        <h4 class="mb-3">Program Details</h4>

        <!-- Admission Period -->
        <div class="col-md-6">
            <label for="program" class="form-label">Select Admission Period</label>
            <select class="form-select" id="program" name="program" required>
                <option value="">Select Admission Period</option>
                <option value="August/September">August/September (Reg/Wk)</option>
                <option value="January/February">January/February (Reg/Wk)</option>
                <option value="June/July">June/July (Sandwich)</option>
            </select>
        </div>

        <!-- Program of Choice -->
        <div class="col-md-6">
            <label for="program_of_choice" class="form-label">Program of Choice</label>
            <select class="form-select select2" id="program_of_choice" name="program_of_choice" required>
                @foreach($programmes as $programme)
                    <option value="{{$programme->programme_title}}">{{$programme->programme_title}}</option>
                @endforeach
            </select>
        </div>

        <!-- Streams -->
        <div class="col-md-6">
            <label for="streams" class="form-label">Streams</label>
            <select class="form-select" id="streams" name="streams" required>
                <option value="">Select Streams</option>
                <option value="Weekend">Weekend</option>
                <option value="Regular">Regular</option>
                <option value="Sandwich">Sandwich</option>
            </select>
        </div>

        <!-- Mature Applicant -->
        <div class="col-md-6 mt-3">
            <label for="mature_applicant" class="form-label">Mature Applicant</label>
            <select class="form-select" id="mature_applicant" name="mature_applicant">
                <option value="">Select Option</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>

        <!-- Navigation Buttons -->
        <div class="col-12 d-flex justify-content-between mt-4">
            <!-- Previous Button -->
            <a href="{{ route('personaldetails.edit', auth()->user()->app_id) }}" class="btn btn-outline-secondary">
                <i class="material-icons">arrow_back</i> Previous
            </a>

            <!-- Save and Continue Button -->
            <button type="submit" class="btn btn-primary">
                Save and Continue <i class="material-icons">arrow_forward</i>
            </button>
        </div>
    </form>
</div>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('select.select2').select2({
            placeholder: "Search and select a Programme",
            allowClear: true,
            language: {
                noResults: function() {
                    return "No Programme found";
                }
            }
        });
    });
</script>
@endsection
