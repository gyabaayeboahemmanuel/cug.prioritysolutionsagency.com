@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('academic_active', 'active bg-gradient-secondary ')
@section('atext', 'text-white')

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

    <form action="{{ route('academicdetails.update', auth()->user()->app_id) }}" method="post" class="row g-3">
        @csrf
        @method('PATCH')
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">

        <h1>Academic Details</h1>

        <!-- 1st Examination Sitting -->
        <div class="exam-sitting row mb-4">
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
        <label for="name_of_shs_2" class="form-label">Name of SHS</label>
        <input type="text" class="form-control" id="name_of_shs_2" name="name_of_shs_2" 
               value="{{ $ad->name_of_shs2 }}">
    </div>
    <div class="col-md-6">
        <label for="course_offered_2" class="form-label">Course Offered</label>
        <input type="text" class="form-control" id="course_offered_2" name="course_offered_2" 
               value="{{ $ad->course_offered2 }}">
    </div>
    <div class="col-md-6">
        <label for="start_date_2" class="form-label">Year & Month Started</label>
        <input type="date" class="form-control" id="start_date_2" name="start_date_2"
               value="{{ $ad->start_date2 }}">
    </div>
    <div class="col-md-6">
        <label for="completion_date_2" class="form-label">Year & Month Completed</label>
        <input type="date" class="form-control" id="completion_date_2" name="completion_date_2"
               value="{{ $ad->completion_date2 }}">
    </div>
    <div class="col-md-6">
        <label for="exams_type_2" class="form-label">Exams Type</label>
        <input type="text" class="form-control" id="exams_type_2" name="exams_type_2" 
               value="{{ $ad->exams_type2 }}">
    </div>
    <div class="col-md-6">
        <label for="index_number_2" class="form-label">Index Number</label>
        <input type="text" class="form-control" id="index_number_2" name="index_number_2"
               value="{{ $ad->index_number2 }}">
    </div>
    <div class="col-md-6">
        <label for="exams_year_2" class="form-label">Exams Year</label>
        <input type="number" class="form-control" id="exams_year_2" name="exams_year_2"
               value="{{ $ad->exams_year2 }}">
    </div>

    <hr>
    <h3>3rd Examination Sitting</h3>

    <div class="col-md-6">
        <label for="name_of_shs_3" class="form-label">Name of SHS</label>
        <input type="text" class="form-control" id="name_of_shs_3" name="name_of_shs_3"
               value="{{ $ad->name_of_shs3 }}">
    </div>
    <div class="col-md-6">
        <label for="course_offered_3" class="form-label">Course Offered</label>
        <input type="text" class="form-control" id="course_offered_3" name="course_offered_3"
               value="{{ $ad->course_offered3 }}">
    </div>
    <div class="col-md-6">
        <label for="start_date_3" class="form-label">Year & Month Started</label>
        <input type="date" class="form-control" id="start_date_3" name="start_date_3"
               value="{{ $ad->start_date3 }}">
    </div>
    <div class="col-md-6">
        <label for="completion_date_3" class="form-label">Year & Month Completed</label>
        <input type="date" class="form-control" id="completion_date_3" name="completion_date_3"
               value="{{ $ad->completion_date3 }}">
    </div>
    <div class="col-md-6">
        <label for="exams_type_3" class="form-label">Exams Type</label>
        <input type="text" class="form-control" id="exams_type_3" name="exams_type_3"
               value="{{ $ad->exams_type3 }}">
    </div>
    <div class="col-md-6">
        <label for="index_number_3" class="form-label">Index Number</label>
        <input type="text" class="form-control" id="index_number_3" name="index_number_3"
               value="{{ $ad->index_number3 }}">
    </div>
    <div class="col-md-6">
        <label for="exams_year_3" class="form-label">Exams Year</label>
        <input type="number" class="form-control" id="exams_year_3" name="exams_year_3"
               value="{{ $ad->exams_year3 }}">
    </div>
</div>


        <div class="col-md-12 text-center mt-3 ">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>

    <div class="row mt-4">
    <div class="col-md-6">
        @if (!empty($pgd->app_id))
            <a class="btn btn-secondary" href="{{ route('programdetails.edit', $pgd->app_id) }}">← Previous</a>
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

</div>
<script>
    window.onload = function () {
        // Check if 2nd Examination Sitting has data
        if (document.getElementById("exams_type_2").value ||
            document.getElementById("index_number_2").value ||
            document.getElementById("exams_year_2").value ||
            document.getElementById("name_of_shs_2").value ||
            document.getElementById("course_offered_2").value ||
            document.getElementById("start_date_2").value ||
            document.getElementById("completion_date_2").value) {
            document.getElementById("extraExamSittings").style.display = "";
            document.getElementById("addExamSitting").style.display = "none";
        }

        // Check if 3rd Examination Sitting has data
        if (document.getElementById("exams_type_3").value ||
            document.getElementById("index_number_3").value ||
            document.getElementById("exams_year_3").value ||
            document.getElementById("name_of_shs_3").value ||
            document.getElementById("course_offered_3").value ||
            document.getElementById("start_date_3").value ||
            document.getElementById("completion_date_3").value) {
            document.getElementById("extraExamSittings").style.display = "";
            document.getElementById("addExamSitting").style.display = "none";
        }
    };

    document.getElementById("addExamSitting").addEventListener("click", function () {
        document.getElementById("extraExamSittings").style.display = "";
        this.style.display = "none"; // Hide the button after clicking
    });
</script>


<!-- JavaScript to toggle the extra examination sittings -->
<script>
    document.getElementById("addExamSitting").addEventListener("click", function() {
        document.getElementById("extraExamSittings").style.display = "";
        this.style.display = "none"; // Hide the button after clicking
    });
</script>

@endsection