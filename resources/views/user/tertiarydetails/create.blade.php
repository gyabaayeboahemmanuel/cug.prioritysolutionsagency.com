@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('tertiary_active','active bg-gradient-secondary ')
@section('ttext','text-white')
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

    <form action="{{ route('tertiarydetails.store') }}" method="post" class="row g-3 shadow p-4 bg-white rounded" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="app_id" readonly id="app_id" value="{{auth()->user()->app_id}}">

        <h1 class="mb-4">
            {{ $pd->form_type == 'postgraduate' ? 'Academic /Professional Qualifications' : 'Tertiary Details' }}
        </h1>

        <div class="col-12">
            <h4>
                {{ $pd->form_type == 'postgraduate' ? 'Undergraduate Qualification' : 'First Institution' }}
            </h4>
        </div>
        <div class="col-md-6">
            <label for="institution_name" class="form-label">Name of Institution</label>
            <input type="text" class="form-control" id="institution_name" name="institution_name" required>
        </div>
        <div class="col-md-6">
            <label for="start_year" class="form-label">Start Year</label>
            <input type="number" class="form-control" id="start_year" name="start_year" required>
        </div>
        <div class="col-md-6">
            <label for="start_month" class="form-label">Start Month</label>
            <input type="text" class="form-control" id="start_month" name="start_month" required>
        </div>
        <div class="col-md-6">
            <label for="completion_year" class="form-label">Completion Year</label>
            <input type="number" class="form-control" id="completion_year" name="completion_year" required>
        </div>
        <div class="col-md-6">
            <label for="completion_month" class="form-label">Completion Month</label>
            <input type="text" class="form-control" id="completion_month" name="completion_month" required>
        </div>
        <div class="col-md-6">
            <label for="certificate_obtained" class="form-label">
                {{ $pd->form_type == 'postgraduate' ? 'Qualification' : 'Certificate Obtained' }}
            </label>
            <input type="text" class="form-control" id="certificate_obtained" name="certificate_obtained" required>
        </div>

        <div class="col-12">
            <button type="button" id="addSecondInstitution" class="btn btn-secondary mb-3">
                {{ $pd->form_type == 'postgraduate' ? 'Add Graduate Qualification' : 'Add 2nd Tertiary Details' }}
            </button>
        </div>

        <div class="col-12" id="secondInstitution" style="display: none;">
            <h4>
                {{ $pd->form_type == 'postgraduate' ? 'Graduate Qualification (If Any)' : 'Second Institution (Optional)' }}
            </h4>
        </div>
        <div class="col-md-6 second-institution" style="display: none;">
            <label for="institution_name2" class="form-label">Name of Institution</label>
            <input type="text" class="form-control" id="institution_name2" name="institution_name2">
        </div>
        <div class="col-md-6 second-institution" style="display: none;">
            <label for="start_year2" class="form-label">Start Year</label>
            <input type="number" class="form-control" id="start_year2" name="start_year2">
        </div>
        <div class="col-md-6 second-institution" style="display: none;">
            <label for="start_month2" class="form-label">Start Month</label>
            <input type="text" class="form-control" id="start_month2" name="start_month2">
        </div>
        <div class="col-md-6 second-institution" style="display: none;">
            <label for="completion_year2" class="form-label">Completion Year</label>
            <input type="number" class="form-control" id="completion_year2" name="completion_year2">
        </div>
        <div class="col-md-6 second-institution" style="display: none;">
            <label for="completion_month2" class="form-label">Completion Month</label>
            <input type="text" class="form-control" id="completion_month2" name="completion_month2">
        </div>
        <div class="col-md-6 second-institution" style="display: none;">
            <label for="certificate_obtained2" class="form-label">
                {{ $pd->form_type == 'postgraduate' ? 'Qualification and Date of Award' : 'Certificate Obtained' }}
            </label>
            <input type="text" class="form-control" id="certificate_obtained2" name="certificate_obtained2">
        </div>

        <div class="col-12">
            <button type="button" id="addThirdInstitution" class="btn btn-secondary mb-3" style="display: none;">
                {{ $pd->form_type == 'postgraduate' ? 'Add Professional Qualification' : 'Add 3rd Tertiary Details' }}
            </button>
        </div>

        <div class="col-12" id="thirdInstitution" style="display: none;">
            <h4>
                {{ $pd->form_type == 'postgraduate' ? 'Professional Qualifications (If Any)' : 'Third Institution (Optional)' }}
            </h4>
        </div>
        <div class="col-md-6 third-institution" style="display: none;">
            <label for="institution_name3" class="form-label">Name of Institution</label>
            <input type="text" class="form-control" id="institution_name3" name="institution_name3">
        </div>
        <div class="col-md-6 third-institution" style="display: none;">
            <label for="start_year3" class="form-label">Start Year</label>
            <input type="number" class="form-control" id="start_year3" name="start_year3">
        </div>
        <div class="col-md-6 third-institution" style="display: none;">
            <label for="start_month3" class="form-label">Start Month</label>
            <input type="text" class="form-control" id="start_month3" name="start_month3">
        </div>
        <div class="col-md-6 third-institution" style="display: none;">
            <label for="completion_year3" class="form-label">Completion Year</label>
            <input type="number" class="form-control" id="completion_year3" name="completion_year3">
        </div>
        <div class="col-md-6 third-institution" style="display: none;">
            <label for="completion_month3" class="form-label">Completion Month</label>
            <input type="text" class="form-control" id="completion_month3" name="completion_month3">
        </div>
        <div class="col-md-6 third-institution" style="display: none;">
            <label for="certificate_obtained3" class="form-label">
                {{ $pd->form_type == 'postgraduate' ? 'Qualification and Major' : 'Certificate Obtained' }}
            </label>
            <input type="text" class="form-control" id="certificate_obtained3" name="certificate_obtained3">
        </div>

        <div class="col-12 d-flex justify-content-between mt-4">
            <a class="btn btn-outline-secondary {{ empty($ad->app_id) ? 'disabled' : '' }}"
                href="{{ empty($ad->app_id) ? '#' : route('academicdetails.edit', $ad->app_id) }}">
                <i class="material-icons">arrow_back</i> Previous
            </a>

            <button type="submit" class="btn btn-primary">
                Save <i class="material-icons">save</i>
            </button>

            @if($pd)
            @if(strtolower($pd->form_type) == 'undergraduate')
            <a class="btn btn-success" href="{{ route('attacheddocuments.edit', auth()->user()->app_id) }}">
                Next <i class="fas fa-arrow-right"></i>
            </a>
            @elseif(strtolower($pd->form_type) == 'postgraduate')
            <a class="btn btn-success" href="{{ route('postgraduatedocuments.index') }}">
                Next <i class="fas fa-arrow-right"></i>
            </a>
            @endif
            @else
            <a class="btn btn-success disabled" href="#">
                Next <i class="fas fa-arrow-right"></i>
            </a>
            @endif
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const secondInstitutionDivs = document.querySelectorAll(".second-institution");
        const thirdInstitutionDivs = document.querySelectorAll(".third-institution");
        const addSecondInstitutionBtn = document.getElementById("addSecondInstitution");
        const addThirdInstitutionBtn = document.getElementById("addThirdInstitution");
        const applicationType = "{{ $pd->form_type }}"; // Get the application type from the Blade variable

        let secondInstitutionAdded = false;
        let thirdInstitutionAdded = false;

        addSecondInstitutionBtn.addEventListener("click", function() {
            secondInstitutionDivs.forEach(div => div.style.display = "block");
            document.getElementById("secondInstitution").style.display = "block";
            this.style.display = "none";
            addThirdInstitutionBtn.style.display = "block";
            secondInstitutionAdded = true;
        });

        addThirdInstitutionBtn.addEventListener("click", function() {
            thirdInstitutionDivs.forEach(div => div.style.display = "block");
            document.getElementById("thirdInstitution").style.display = "block";
            this.style.display = "none";
            thirdInstitutionAdded = true;
        });
    });
</script>

@endsection
