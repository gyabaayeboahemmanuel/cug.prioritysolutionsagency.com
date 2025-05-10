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

    <form action="{{ route('employmentdetails.update', $employmentDetail->id) }}" method="post" class="row g-3 shadow p-4 bg-white rounded">
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">
        @csrf
        @method('PATCH')

        <h4 class="mb-4">Edit Employment Details</h4>

        <!-- Employer Name -->
        <div class="col-md-4">
            <label for="employer_name" class="form-label">Employer Name</label>
            <input type="text" class="form-control" id="employer_name" name="employer_name" value="{{ $employmentDetail->employer_name }}">
        </div>

        <!-- Employer Phone -->
        <div class="col-md-4">
            <label for="employer_phone" class="form-label">Employer Phone</label>
            <input type="tel" class="form-control" id="employer_phone" name="employer_phone" value="{{ $employmentDetail->employer_phone }}">
        </div>

        <!-- Employer Address -->
        <div class="col-md-4">
            <label for="employer_address" class="form-label">Employer Address</label>
            <input type="text" class="form-control" id="employer_address" name="employer_address" value="{{ $employmentDetail->employer_address }}">
        </div>

        <!-- Employer Email -->
        <div class="col-md-4">
            <label for="employer_email" class="form-label">Employer Email</label>
            <input type="email" class="form-control" id="employer_email" name="employer_email" value="{{ $employmentDetail->employer_email }}">
        </div>

        <div class="col-12 d-flex justify-content-between mt-4">
            <a href="{{ route('employmentdetails.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left">arrow_back</i> Back to List
            </a>

            <button type="submit" class="btn btn-primary">
                Update Changes <i class="material-icons">save</i>
            </button>
        </div>
    </form>
</div>
@endsection
