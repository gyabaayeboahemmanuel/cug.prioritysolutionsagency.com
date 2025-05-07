@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
{{-- @include('user.components.application') --}}

<a href="{{ route('application.print', auth()->user()->app_id)}}" target="_blank"><button>SUBMIT AND PRINT</button></a>
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="{{ asset('assets/logos/school-logo.png') }}" width='150px' class="rounded float-left"
                alt="LOGO OF CUG">
        </div>
        <div class="col-6">
            <h2>CATHOLIC UNIVERSITY OF GHANA</h2>
            <h3>FIAPRE-SUNYANI</h3>
            <h4>UNDERGRADUATE ADMISSIONS</h4>
            <tr>
                <th scope="col">APPLICATION ID: </th>
                <td>{{$pd->app_id}}</td>
            </tr>
        </div>
        <div class="col-3">
            @if(!empty($pd->avatar))
              
            <img src="{{ asset('storage/'. $pd->avatar)}}" width='150px' class="rounded float-left me-sm-1" alt="APPLICANT'S PROFILE PHOTO">
          @endif
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-success">PERSONAL DETAILS</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <th>Title: </th>
                    <td>
                        {{$pd->title}}
                        {{-- @if($pd->gender == 'Male')
                        Mr.
                        @endif
                        @if($pd->gender = 'Female')
                        Ms/Mrs.
                        @endif --}}
                    </td>
                    <th>Surname: </th>
                    <td>{{ $pd->surname }}</td>
                </tr>
                <tr>
                    <th>Firstname: </th>
                    <td>{{ $pd->first_name }}</td>
                    <th>Middle Name: </th>
                    <td>{{ $pd->middle_name }}</td>
                </tr>
                <tr>
                    <th>Gender: </th>
                    <td>{{ $pd->gender }}</td>

                    <th>Date of Birth: </th>
                    <td>{{ $pd->date_of_birth }}</td>
                </tr>
                <tr>
                    <th>Place of Birth: </th>
                    <td>{{ $pd->place_of_birth }}</td>
                    <th>Region of Birth: </th>
                    <td>{{ $pd->region_of_birth }}</td>
                </tr>
                <tr>
                    <th>Hometown: </th>
                    <td>{{ $pd->hometown }}</td>
                    <th>Region of Hometown: </th>
                    <td>{{ $pd->region_of_hometown }}</td>
                </tr>
                <tr>
                    <th>Country: </th>
                    <td>{{ $pd->country }}</td>
                </tr>
                <tr>
                    <th>Marital Status: </th>
                    <td>{{ $pd->marital_status }}</td>
                    <th>Number of Children: </th>
                    <td>{{ $pd->number_of_children }}</td>
                </tr>
                <tr>
                    <th>Religion: </th>
                    <td>{{ $pd->religion }}</td>
                    <th>Worship Place: </th>
                    <td>{{ $pd->worship_place }}</td>
                </tr>
                <tr>
                    <th>Employed: </th>
                    <td>{{ $pd->is_employed }}</td>
                    <th>Occupation: </th>
                    <td>{{ $pd->occupation }}</td>
                </tr>
                <tr>
                    <th>Facility: </th>
                    <td>{{ $pd->facility }}</td>
                    <th>Intend Finance Education: </th>
                    <td>{{ $pd->intend_finance_education }}</td>
                </tr>
                <tr>

                </tr>

            </tbody>
        </table>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-success">CONTACT DETAILS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Phone Number: </th>
                    <td>{{ $cd->phone_number }}</td>
                    <th>Whatsapp Number: </th>
                    <td>{{ $cd->online_number }}</td>
                </tr>
                <tr>
                    <th>Email's Address: </th>
                    <td>{{ $cd->email_address }}</td>
                    <th>Postal Address: </th>
                    <td>{{ $cd->postal_address }}</td>
                </tr>
                <tr>
                    <th>City of Post Office Box: </th>
                    <td>{{ $cd->city_of_post_office_box }}</td>

                    <th>Residential Address: </th>
                    <td>{{ $cd->residential_address }}</td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-success">FAMILY DETAILS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Father's Full Name: </th>
                    <td>{{ $fd->father_full_name }}</td>
                    <th>Father's Status: </th>
                    <td>{{ $fd->father_status }}</td>
                </tr>
                <tr>
                    <th>Father's Address: </th>
                    <td>{{ $fd->father_address }}</td>
                    <th>Father's Contact: </th>
                    <td>{{ $fd->father_contact }}</td>
                </tr>
                <tr>
                    <th>Father's Occupation: </th>
                    <td>{{ $fd->father_occupation }}</td>
                </tr>
                <tr>
                    <th>Mothers's Full Name: </th>
                    <td>{{ $fd->mother_full_name }}</td>
                    <th>Mother's Status: </th>
                    <td>{{ $fd->mother_status }}</td>
                </tr>
                <tr>
                    <th>Mother's Address: </th>
                    <td>{{ $fd->mother_address }}</td>
                    <th>Mother's Contact: </th>
                    <td>{{ $fd->mother_contact }}</td>
                </tr>
                <tr>
                    <th>Mother's Occupation: </th>
                    <td>{{ $fd->mother_occupation }}</td>
                </tr>
                <tr>
                    <th>Guardian's Full Name: </th>
                    <td>{{ $fd->guardian_name }}</td>
                    <th>Guardian's Relationship to Applicant: </th>
                    <td>{{ $fd->relation_to_applicant }}</td>
                </tr>
                <tr>
                    <th>Guardian's Address: </th>
                    <td>{{ $fd->guardian_address }}</td>
                    <th>Guardian's Contact: </th>
                    <td>{{ $fd->guardian_phone_number }}</td>
                </tr>
                <tr>
                    <th>Guardian's Occupation: </th>
                    <td>{{ $fd->guardian_occupation }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- PROGRAMME DETAILS --}}
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-success">PROGRAMME DETAILS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Program of Choice: </th>
                    <td>{{ $pgd->program_of_choice }}</td>
                    <th>Streams: </th>
                    <td>{{ $pgd->streams }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- EDUCATIONAL DETAILS --}}
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-success">ACADEMIC DETAILS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Name of SHS: </th>
                    <td>{{ $ad->name_of_shs }}</td>
                    <th>Course Offered: </th>
                    <td>{{ $ad->course_offered }}</td>
                </tr>
                <tr>
                    <th>Year & Month Started: </th>
                    <td>{{ $ad->start_date }}</td>
                    <th>Year & Month Completed: </th>
                    <td>{{ $ad->completion_date }}</td>
                </tr>
                <tr>
                    <th>Exams Type: </th>
                    <td>{{ $ad->exams_type }}</td>
                    <th>Index Number: </th>
                    <td>{{ $ad->index_number }}</td>
                </tr>
                <tr>
                    <th>Exams year: </th>
                    <td>{{ $ad->exams_year }}</td>
                    <th>Course Offered: </th>
                    <td>{{ $ad->course_offered }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- EDUCATIONAL DETAILS --}}
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-success">TERTIARY DETAILS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Institution Name: </th>
                    <td>{{ $td->institution_name }}</td>
                    <th>Certificate Obtained: </th>
                    <td>{{ $td->certificate_obtained }}</td>
                </tr>
                <tr>
                    <th>Year & Month Started: </th>
                    <td> {{ $td->start_month }}, {{ $td->start_year }}</td>
                    <th>Year & Month Completed: </th>
                    <td>
                        {{ $td->completion_month }},{{ $td->completion_year }}
                       

                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>




    {{-- DECLARATION DETAILS --}}
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-success"> DECLARATION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> I declare that the information provided is genuine and reflects my true records. (An
                        applicant who makes a
                        false declaration or withholds relevant information may be refused admission. If he or she
                        has come
                        into the University already; he/she may be asked to withdraw)</td>
                </tr>
                <tr>
                    <td> DATE: </td>
                    <td> SIGNATURE:<img src="{{ asset('storage/'.$at->signature) }}" width='50px' class="rounded float-right"
                        alt="signature of applicant"> </td>
                </tr>
            </tbody>
        </table>
    </div>


    {{-- ENDORSEMENT DETAILS --}}
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-success"> ENDORSEMENT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>The declaration in E. above must be endorsed below by someone of high repute. This person
                        should be
                        a Parish Priest, Senior Public Servant or a person belonging to the learned profession (e.g.
                        Lawyer,
                        Medical Practitioner) or a Headmaster/Principal of the applicant’s last educational
                        institution)</td>
                </tr>
                <tr>
                    <td> DATE:  </td>
                    <td> SIGNATURE:  <img src="{{ asset('assets/logos/ceosignature.png') }}" width='50px' class="rounded float-right"
                        alt="signature of applicant"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    {{-- ENDORSEMENT DETAILS --}}
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-success"> Referral Details  </th>
                </tr>
            </thead>
            <tbody>           
                <tr>
                    <th> Name of Referrer:</th>
                    <td> PRIORITY SOLUTIONS AGENCY </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>


@endsection
