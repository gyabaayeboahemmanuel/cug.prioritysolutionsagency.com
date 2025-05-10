@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('employment_active', 'active bg-gradient-secondary')
@section('etext', 'text-white')

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

    <form action="{{ route('employmentdetails.store') }}" method="post" class="row g-3 shadow p-4 bg-white rounded">
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">
        @csrf
        @method('POST')

        <h4 class="mb-4">Employment Details</h4>

        <div class="col-md-6">
            <label for="employer_name" class="form-label">Employer Name</label>
            <input type="text" class="form-control" id="employer_name" name="employer_name" required>
        </div>

        <div class="col-md-6">
            <label for="current_position" class="form-label">Current Position</label>
            <input type="text" class="form-control" id="current_position" name="current_position">
        </div>

        <div class="col-md-6">
            <label for="employer_phone" class="form-label">Employer Phone</label>
            <input type="tel" class="form-control" id="employer_phone" name="employer_phone">
        </div>

        <div class="col-md-6">
            <label for="employer_email" class="form-label">Employer Email</label>
            <input type="email" class="form-control" id="employer_email" name="employer_email">
        </div>

        <div class="col-md-6">
            <label for="employment_from" class="form-label">Employment From</label>
            <input type="date" class="form-control" id="employment_from" name="employment_from">
        </div>

        <div class="col-md-6">
            <label for="employment_to" class="form-label">Employment To</label>
            <input type="date" class="form-control" id="employment_to" name="employment_to">
        </div>

        <div class="col-12 d-flex justify-content-between mt-4">
            <a href="{{ route('personaldetails.edit', auth()->user()->app_id) }}" class="btn btn-outline-secondary">
                <i class="material-icons">arrow_back</i> Previous
            </a>
            <button type="submit" class="btn btn-primary">
                Save and Continue <i class="material-icons">save</i>
            </button>
            <a class="btn btn-success" href="{{ route('references.create') }}">
                Next <i class="material-icons">arrow_forward</i>
            </a>
        </div>
    </form>
</div>
@endsection
