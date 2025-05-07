@extends('layouts.admin')

@section('content')
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
    <h1>Edit Academic Details for {{ $ad->app_id }}</h1>

    <form action="{{ route('admin.academic-details.update', $ad->app_id) }}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">

        <h1>Academic Details</h1>

        <!-- 1st Examination Sitting -->
        <div class="exam-sitting">
            <h3>1st Examination Sitting</h3>
            <div class="col-md-6">
                <label for="name_of_shs" class="form-label">Name of SHS</label>
                <input type="text" class="form-control" value="{{ $ad->name_of_shs }}" id="name_of_shs"
                    name="name_of_shs" required>
            </div>
            <div class="col-md-6">
                <label for="course_offered" class="form-label">Course Offered</label>
                <input type="text" class="form-control" value="{{ $ad->course_offered }}" id="course_offered"
                    name="course_offered" required>
            </div>
            <div class="col-md-6">
                <label for="start_date" class="form-label">Year & Month Started</label>
                <input type="date" class="form-control" id="start_date" value="{{ $ad->start_date }}" name="start_date"
                    required>
            </div>
            <div class="col-md-6">
                <label for="completion_date" class="form-label">Year & Month Completed</label>
                <input type="date" class="form-control" id="completion_date" value="{{ $ad->completion_date }}"
                    name="completion_date" required>
            </div>
            <div class="col-md-6">
                <label for="exams_type" class="form-label">Exams Type</label>
                <input type="text" class="form-control" id="exams_type" value="{{ $ad->exams_type }}" name="exams_type"
                    required>
            </div>
            <div class="col-md-6">
                <label for="index_number" class="form-label">Index Number</label>
                <input type="text" class="form-control" id="index_number" value="{{ $ad->index_number }}"
                    name="index_number" required>
            </div>
            <div class="col-md-6">
                <label for="exams_year" class="form-label">Exams Year</label>
                <input type="number" class="form-control" id="exams_year" value="{{ $ad->exams_year }}"
                    name="exams_year" required>
            </div>
        </div>

        <!-- Button to show additional examination sittings -->
        <div class="col-md-12">
            <button type="button" id="addExamSitting" class="btn btn-secondary">Add 2nd Examination Sitting</button>
        </div>

        <!-- 2nd & 3rd Examination Sitting (Hidden by Default) -->
        <div id="extraExamSittings" style="display: none;">
            <hr>
            <h3>2nd Examination Sitting</h3>
            <div class="col-md-6">
                <label for="exams_type_2" class="form-label">Exams Type</label>
                <input type="text" class="form-control" id="exams_type_2" name="exams_type_2">
            </div>
            <div class="col-md-6">
                <label for="index_number_2" class="form-label">Index Number</label>
                <input type="text" class="form-control" id="index_number_2" name="index_number_2">
            </div>
            <div class="col-md-6">
                <label for="exams_year_2" class="form-label">Exams Year</label>
                <input type="number" class="form-control" id="exams_year_2" name="exams_year_2">
            </div>

            <h3>3rd Examination Sitting</h3>
            <div class="col-md-6">
                <label for="exams_type_3" class="form-label">Exams Type</label>
                <input type="text" class="form-control" id="exams_type_3" name="exams_type_3">
            </div>
            <div class="col-md-6">
                <label for="index_number_3" class="form-label">Index Number</label>
                <input type="text" class="form-control" id="index_number_3" name="index_number_3">
            </div>
            <div class="col-md-6">
                <label for="exams_year_3" class="form-label">Exams Year</label>
                <input type="number" class="form-control" id="exams_year_3" name="exams_year_3">
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
@endsection
