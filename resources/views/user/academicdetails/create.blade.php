@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('academic_active','active bg-gradient-secondary ')
@section('atext','text-white')

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

    <form action="{{ route('academicdetails.store') }}" method="post" class="row g-3">
        @csrf
        @method('POST')
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">

        <h1>Academic Details</h1>

        <!-- First Examination Sitting -->
        <div class="col-md-6">
            <label for="name_of_shs" class="form-label">Name of SHS</label>
            <input type="text" class="form-control" id="name_of_shs" name="name_of_shs" required>
        </div>
        <div class="col-md-6">
            <label for="course_offered" class="form-label">Course Offered</label>
            <input type="text" class="form-control" id="course_offered" name="course_offered" required>
        </div>
        <div class="col-md-6">
            <label for="start_date" class="form-label">Year & Month Started</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="col-md-6">
            <label for="completion_date" class="form-label">Year & Month Completed</label>
            <input type="date" class="form-control" id="completion_date" name="completion_date" required>
        </div>
        <div class="col-md-6">
            <label for="exams_type" class="form-label">Exams Type</label>
            <input type="text" class="form-control" id="exams_type" name="exams_type" required>
        </div>
        <div class="col-md-6">
            <label for="index_number" class="form-label">Index Number</label>
            <input type="text" class="form-control" id="index_number" name="index_number" required>
        </div>
        <div class="col-md-6">
            <label for="exams_year" class="form-label">Exams Year</label>
            <input type="number" class="form-control" id="exams_year" name="exams_year" required>
        </div>

        <!-- Button to Add Second Sitting -->
        <div class="col-md-12">
            <button type="button" class="btn btn-secondary" id="addSecondSitting">Add 2nd Examination Sitting</button>
        </div>

        <!-- Second Examination Sitting (Initially Hidden) -->
        <div id="secondSitting" style="display: none;">
            <h2>Second Examination Sitting</h2>
            <div class="col-md-6">
                <label for="name_of_shs2" class="form-label">Name of SHS</label>
                <input type="text" class="form-control" id="name_of_shs2" name="name_of_shs2">
            </div>
            <div class="col-md-6">
                <label for="course_offered2" class="form-label">Course Offered</label>
                <input type="text" class="form-control" id="course_offered2" name="course_offered2">
            </div>
            <div class="col-md-6">
                <label for="start_date2" class="form-label">Year & Month Started</label>
                <input type="date" class="form-control" id="start_date2" name="start_date2">
            </div>
            <div class="col-md-6">
                <label for="completion_date2" class="form-label">Year & Month Completed</label>
                <input type="date" class="form-control" id="completion_date2" name="completion_date2">
            </div>
            <div class="col-md-6">
                <label for="exams_type2" class="form-label">Exams Type</label>
                <input type="text" class="form-control" id="exams_type2" name="exams_type2">
            </div>
            <div class="col-md-6">
                <label for="index_number2" class="form-label">Index Number</label>
                <input type="text" class="form-control" id="index_number2" name="index_number2">
            </div>
            <div class="col-md-6">
                <label for="exams_year2" class="form-label">Exams Year</label>
                <input type="number" class="form-control" id="exams_year2" name="exams_year2">
            </div>

            <!-- Button to Add Third Sitting -->
            <div class="col-md-12">
                <button type="button" class="btn btn-secondary" id="addThirdSitting">Add 3rd Examination Sitting</button>
            </div>
        </div>

        <!-- Third Examination Sitting (Initially Hidden) -->
        <div id="thirdSitting" style="display: none;">
            <h2>Third Examination Sitting</h2>
            <div class="col-md-6">
                <label for="name_of_shs3" class="form-label">Name of SHS</label>
                <input type="text" class="form-control" id="name_of_shs3" name="name_of_shs3">
            </div>
            <div class="col-md-6">
                <label for="course_offered3" class="form-label">Course Offered</label>
                <input type="text" class="form-control" id="course_offered3" name="course_offered3">
            </div>
            <div class="col-md-6">
                <label for="start_date3" class="form-label">Year & Month Started</label>
                <input type="date" class="form-control" id="start_date3" name="start_date3">
            </div>
            <div class="col-md-6">
                <label for="completion_date3" class="form-label">Year & Month Completed</label>
                <input type="date" class="form-control" id="completion_date3" name="completion_date3">
            </div>
            <div class="col-md-6">
                <label for="exams_type3" class="form-label">Exams Type</label>
                <input type="text" class="form-control" id="exams_type3" name="exams_type3">
            </div>
            <div class="col-md-6">
                <label for="index_number3" class="form-label">Index Number</label>
                <input type="text" class="form-control" id="index_number3" name="index_number3">
            </div>
            <div class="col-md-6">
                <label for="exams_year3" class="form-label">Exams Year</label>
                <input type="number" class="form-control" id="exams_year3" name="exams_year3">
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Save and Continue</button>
        </div>
        <div class="row mt-4">
    <div class="col-md-6">
        @if (!empty($cd->app_id))
            <a class="btn btn-secondary" href="{{ route('contactdetails.edit', $cd->app_id) }}">← Previous</a>
        @else
            <a class="btn btn-secondary disabled" href="#">← Previous</a>
        @endif
    </div>

    <div class="col-md-6 text-end">
        @if (empty($td->app_id))
            <a class="btn btn-primary" href="{{ route('tertiarydetails.create') }}">Next →</a>
        @else
            <a class="btn btn-primary" href="{{ route('tertiarydetails.edit', $ad->app_id) }}">Next →</a>
        @endif
    </div>
</div>

    </form>
</div>

<script>
    document.getElementById('addSecondSitting').addEventListener('click', function() {
        document.getElementById('secondSitting').style.display = 'block';
    });

    document.getElementById('addThirdSitting').addEventListener('click', function() {
        document.getElementById('thirdSitting').style.display = 'block';
    });
</script>

@endsection
