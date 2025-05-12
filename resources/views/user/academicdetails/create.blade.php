@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('academic_active', 'active bg-gradient-secondary ')
@section('atext', 'text-white')
@section('content')

<div class="container mt-5">
    <form action="{{ route('academicdetails.store', auth()->user()->app_id) }}" method="post" class="row g-3 shadow p-4 bg-white rounded">
        @csrf
        @method('POST')
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">

        <h1 class="mb-4">Academic Details</h1>

        <div class="col-12">
            <h4>1st Examination Sitting</h4>
        </div>
        <div class="col-md-6">
            <label class="form-label">Name of SHS</label>
            <input type="text" class="form-control" name="name_of_shs" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Course Offered</label>
            <input type="text" class="form-control" name="course_offered" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Year & Month Started</label>
            <input type="date" class="form-control" name="start_date" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Year & Month Completed</label>
            <input type="date" class="form-control" name="completion_date" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Exams Type</label>
            <select class="form-select" name="exams_type" required>
                <option value="" selected disabled>Select Exam Type</option>
                <option value="WASSCE School Candidate">WASSCE School Candidate</option>
                <option value="WASSCE Private Candidate">WASSCE Private Candidate</option>
                <option value="GCE O Level">GCE O Level</option>
                <option value="GCE A Level">GCE A Level</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Index Number</label>
            <input type="text" class="form-control" name="index_number" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Exams Year</label>
            <input type="number" class="form-control" name="exams_year" required>
        </div>

        <div id="secondSitting" style="display: none;" class="col-12">
            <h4 class="mt-4">2nd Examination Sitting</h4>
        </div>
        @foreach (['name_of_shs2', 'course_offered2', 'start_date2', 'completion_date2', 'exams_type2', 'index_number2', 'exams_year2'] as $field)
            <div class="col-md-6 second-sitting" style="display: none;">
                <label class="form-label">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                @if($field == 'exams_type2')
                    <select class="form-select" name="{{ $field }}">
                        <option value="" selected disabled>Select Exam Type</option>
                        <option value="WASSCE School Candidate">WASSCE School Candidate</option>
                        <option value="WASSCE Private Candidate">WASSCE Private Candidate</option>
                        <option value="GCE O Level">GCE O Level</option>
                        <option value="GCE A Level">GCE A Level</option>
                    </select>
                @else
                    <input type="{{ str_contains($field, 'date') ? 'date' : 'text' }}" class="form-control" name="{{ $field }}">
                @endif
            </div>
        @endforeach

        <div id="thirdSitting" style="display: none;" class="col-12">
            <h4 class="mt-4">3rd Examination Sitting</h4>
        </div>
        @foreach (['name_of_shs3', 'course_offered3', 'start_date3', 'completion_date3', 'exams_type3', 'index_number3', 'exams_year3'] as $field)
            <div class="col-md-6 third-sitting" style="display: none;">
                <label class="form-label">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                @if($field == 'exams_type3')
                    <select class="form-select" name="{{ $field }}">
                        <option value="" selected disabled>Select Exam Type</option>
                        <option value="WASSCE School Candidate">WASSCE School Candidate</option>
                        <option value="WASSCE Private Candidate">WASSCE Private Candidate</option>
                        <option value="GCE O Level">GCE O Level</option>
                        <option value="GCE A Level">GCE A Level</option>
                    </select>
                @else
                    <input type="{{ str_contains($field, 'date') ? 'date' : 'text' }}" class="form-control" name="{{ $field }}">
                @endif
            </div>
        @endforeach

        <div class="col-md-12 mt-4">
            <button type="button" id="addExamSitting" class="btn btn-secondary">
                Add 2nd Examination Sitting
            </button>
        </div>
        <div class="col-md-12 mt-4">
            <button type="button" id="addThirdExamSitting" class="btn btn-secondary" style="display:none;">
                Add 3rd Examination Sitting
            </button>
        </div>

        <div class="col-12 d-flex justify-content-between mt-4">
            <a class="btn btn-outline-secondary" href="{{ route('programdetails.create') }}">
                <i class="material-icons">arrow_back</i> Previous
            </a>

            <button type="submit" class="btn btn-primary">
                Save and Continue <i class="material-icons">save</i>
            </button>

            <a class="btn btn-success disabled" href="#">
                Next <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const secondSittingDivs = document.querySelectorAll(".second-sitting");
        const thirdSittingDivs = document.querySelectorAll(".third-sitting");
        const addExamSittingBtn = document.getElementById("addExamSitting");
        const addThirdExamSittingBtn = document.getElementById("addThirdExamSitting");

        addExamSittingBtn.addEventListener("click", function() {
            secondSittingDivs.forEach(div => div.style.display = "block");
            document.getElementById("secondSitting").style.display = "block";
            this.style.display = "none";
            addThirdExamSittingBtn.style.display = "block";
        });

        addThirdExamSittingBtn.addEventListener("click", function() {
            thirdSittingDivs.forEach(div => div.style.display = "block");
            document.getElementById("thirdSitting").style.display = "block";
            this.style.display = "none";
        });
    });
</script>

@endsection
