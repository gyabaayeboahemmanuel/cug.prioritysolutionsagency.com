@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('tertiary_active','active bg-gradient-secondary ')
@section('ttext','text-white')
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

        <form action="{{ route('tertiarydetails.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" name="app_id" readonly id="app_id" value="{{auth()->user()->app_id}}">

            <h1>
                {{ $pd->form_type == 'postgraduate' ? 'Academic /Professional Qualifications' : 'Tertiary Details' }}
            </h1>

            <div class="row mb-4">
                <h4>
                    {{ $pd->form_type == 'postgraduate' ? 'Undergraduate Qualification' : 'First Institution' }}
                </h4>
                <div class="col-md-6">
                    <label for="institution_name" class="form-label">Name of Institution</label>
                    <input type="text" class="form-control" id="institution_name" name="institution_name" >
                </div>
                <div class="col-md-6">
                    <label for="start_year" class="form-label">Start Year</label>
                    <input type="number" class="form-control" id="start_year" name="start_year" >
                </div>
                <div class="col-md-6">
                    <label for="start_month" class="form-label">Start Month</label>
                    <input type="text" class="form-control" id="start_month" name="start_month" >
                </div>
                <div class="col-md-6">
                    <label for="completion_year" class="form-label">Completion Year</label>
                    <input type="number" class="form-control" id="completion_year" name="completion_year" >
                </div>
                <div class="col-md-6">
                    <label for="completion_month" class="form-label">Completion Month</label>
                    <input type="text" class="form-control" id="completion_month" name="completion_month" >
                </div>
                <div class="col-md-6">
                    <label for="certificate_obtained" class="form-label">
                         {{ $pd->form_type == 'postgraduate' ? 'Qualification' : 'Certificate Obtained' }}
                    </label>
                    <input type="text" class="form-control" id="certificate_obtained" name="certificate_obtained">
                </div>
            </div>

            <button type="button" id="addSecondInstitution" class="btn btn-secondary mb-3">
                {{ $pd->form_type == 'postgraduate' ? 'Add Graduate Qualification' : 'Add 2nd Tertiary Details' }}
            </button>

            <div class="row mb-4" id="secondInstitution" style="display: none;">
                <h4>
                     {{ $pd->form_type == 'postgraduate' ? 'Graduate Qualification (If Any)' : 'Second Institution (Optional)' }}
                </h4>
                <div class="col-md-6">
                    <label for="institution_name2" class="form-label">Name of Institution</label>
                    <input type="text" class="form-control" id="institution_name2" name="institution_name2">
                </div>
                <div class="col-md-6">
                    <label for="start_year2" class="form-label">Start Year</label>
                    <input type="number" class="form-control" id="start_year2" name="start_year2">
                </div>
                <div class="col-md-6">
                    <label for="start_month2" class="form-label">Start Month</label>
                    <input type="text" class="form-control" id="start_month2" name="start_month2">
                </div>
                <div class="col-md-6">
                    <label for="completion_year2" class="form-label">Completion Year</label>
                    <input type="number" class="form-control" id="completion_year2" name="completion_year2">
                </div>
                <div class="col-md-6">
                    <label for="completion_month2" class="form-label">Completion Month</label>
                    <input type="text" class="form-control" id="completion_month2" name="completion_month2">
                </div>
                 <div class="col-md-6">
                    <label for="certificate_obtained2" class="form-label">
                         {{ $pd->form_type == 'postgraduate' ? 'Qualification and Date of Award' : 'Certificate Obtained' }}
                    </label>
                    <input type="text" class="form-control" id="certificate_obtained2" name="certificate_obtained2">
                </div>
            </div>

            <button type="button" id="addThirdInstitution" class="btn btn-secondary mb-3" style="display: none;">
                {{ $pd->form_type == 'postgraduate' ? 'Add Professional Qualification' : 'Add 3rd Tertiary Details' }}
            </button>

            <div class="row mb-4" id="thirdInstitution" style="display: none;">
                <h4>
                     {{ $pd->form_type == 'postgraduate' ? 'Professional Qualifications (If Any)' : 'Third Institution (Optional)' }}
                </h4>
                <div class="col-md-6">
                    <label for="institution_name3" class="form-label">Name of Institution</label>
                    <input type="text" class="form-control" id="institution_name3" name="institution_name3">
                </div>
                <div class="col-md-6">
                    <label for="start_year3" class="form-label">Start Year</label>
                    <input type="number" class="form-control" id="start_year3" name="start_year3">
                </div>
                <div class="col-md-6">
                    <label for="start_month3" class="form-label">Start Month</label>
                    <input type="text" class="form-control" id="start_month3" name="start_month3">
                </div>
                <div class="col-md-6">
                    <label for="completion_year3" class="form-label">Completion Year</label>
                    <input type="number" class="form-control" id="completion_year3" name="completion_year3">
                </div>
                <div class="col-md-6">
                    <label for="completion_month3" class="form-label">Completion Month</label>
                    <input type="text" class="form-control" id="completion_month3" name="completion_month3">
                </div>
                <div class="col-md-6">
                     <label for="certificate_obtained3" class="form-label">
                         {{ $pd->form_type == 'postgraduate' ? 'Qualification and Major' : 'Certificate Obtained' }}
                    </label>
                    <input type="text" class="form-control" id="certificate_obtained3" name="certificate_obtained3">
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Save and Continue</button>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const secondInstitutionDiv = document.getElementById('secondInstitution');
                    const thirdInstitutionDiv = document.getElementById('thirdInstitution');
                    const addSecondInstitutionBtn = document.getElementById('addSecondInstitution');
                    const addThirdInstitutionBtn = document.getElementById('addThirdInstitution');
                    const formType = "{{ $pd->form_type }}";

                    addSecondInstitutionBtn.addEventListener('click', function() {
                        secondInstitutionDiv.style.display = 'block';
                        this.style.display = 'none';
                        addThirdInstitutionBtn.style.display = 'inline-block';
                    });

                    addThirdInstitutionBtn.addEventListener('click', function() {
                        thirdInstitutionDiv.style.display = 'block';
                        this.style.display = 'none';
                    });
                });
            </script>

        </form>
    </div>
@endsection
