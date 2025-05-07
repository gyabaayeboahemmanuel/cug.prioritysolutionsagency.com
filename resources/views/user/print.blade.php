<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pd->surname }} {{ $pd->first_name }} {{ $pd->middle_name }} | PRINT CUG APPLICATION</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/logos/school-logo.png') }}">

    <style>
        /* Set A4 size */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @page {
            size: A4;
            margin: 0;
        }

        /* Set content to fill the entire A4 page */
        html,
        body {
            width: 210mm;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /*
        div.ex1 {
  width: 500px;
  margin: auto;
  border: 3px solid #73AD21;
} */
    </style>
</head>

<body onload="window.print()">
    <div class="container">
    <div class="row">
    <div class="col-3">
        <img src="{{ asset('assets/logos/school-logo.png') }}" width="150px" class="rounded float-left"
            alt="LOGO OF CUG">
    </div>

    <div class="col-6">
        <h2>CATHOLIC UNIVERSITY OF GHANA</h2>
        <h3>FIAPRE-SUNYANI</h3>
        <h4
            @if($pd->form_type === 'postgraduate')
                class="text-primary"
            @else
                class="text-success"
            @endif
        >
            {{ strtoupper($pd->form_type) }} ADMISSIONS
        </h4>

        <table class="table">
            <tr>
                <th scope="col">APPLICATION ID: </th>
                <td>{{ $pd->app_id }}</td>
            </tr>
            <tr>
                <th scope="col">{{ $pgd->program }} {{ $pd->academic_year }} </th>
            </tr>
        </table>
    </div>

    <div class="col-3">
        @if (!empty($pd->avatar))
            <img src="{{ asset('storage/'. $pd->avatar) }}" width="150px" class="rounded float-left me-sm-1"
                alt="APPLICANT'S PROFILE PHOTO">
        @endif
    </div>
</div>

<hr>

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
                        <td>{{$pd->title}}</td>
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
        {{-- ACADEMIC DETAILS --}}
        @if($pd->form_type === 'undergraduate')
        @if($ad->name_of_shs || $ad->course_offered || $ad->start_date || $ad->completion_date)
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-success">ACADEMIC DETAILS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Name of SHS:</th>
                        <td>{{ $ad->name_of_shs }}</td>
                        <th>Course Offered:</th>
                        <td>{{ $ad->course_offered }}</td>
                    </tr>
                    <tr>
                        <th>Year & Month Started:</th>
                        <td>{{ $ad->start_date }}</td>
                        <th>Year & Month Completed:</th>
                        <td>{{ $ad->completion_date }}</td>
                    </tr>
                    <tr>
                        <th>Exams Type:</th>
                        <td>{{ $ad->exams_type }}</td>
                        <th>Index Number:</th>
                        <td>{{ $ad->index_number }}</td>
                    </tr>
                    <tr>
                        <th>Exams Year:</th>
                        <td>{{ $ad->exams_year }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if($ad->name_of_shs2 || $ad->course_offered2 || $ad->start_date2 || $ad->completion_date2)
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-success">ACADEMIC DETAILS 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Name of SHS 2:</th>
                        <td>{{ $ad->name_of_shs2 }}</td>
                        <th>Course Offered 2:</th>
                        <td>{{ $ad->course_offered2 }}</td>
                    </tr>
                    <tr>
                        <th>Year & Month Started 2:</th>
                        <td>{{ $ad->start_date2 }}</td>
                        <th>Year & Month Completed 2:</th>
                        <td>{{ $ad->completion_date2 }}</td>
                    </tr>
                    <tr>
                        <th>Exams Type 2:</th>
                        <td>{{ $ad->exams_type2 }}</td>
                        <th>Index Number 2:</th>
                        <td>{{ $ad->index_number2 }}</td>
                    </tr>
                    <tr>
                        <th>Exams Year 2:</th>
                        <td>{{ $ad->exams_year2 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if($ad->name_of_shs3 || $ad->course_offered3 || $ad->start_date3 || $ad->completion_date3)
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-success">ACADEMIC DETAILS 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Name of SHS 3:</th>
                        <td>{{ $ad->name_of_shs3 }}</td>
                        <th>Course Offered 3:</th>
                        <td>{{ $ad->course_offered3 }}</td>
                    </tr>
                    <tr>
                        <th>Year & Month Started 3:</th>
                        <td>{{ $ad->start_date3 }}</td>
                        <th>Year & Month Completed 3:</th>
                        <td>{{ $ad->completion_date3 }}</td>
                    </tr>
                    <tr>
                        <th>Exams Type 3:</th>
                        <td>{{ $ad->exams_type_3 }}</td>
                        <th>Index Number 3:</th>
                        <td>{{ $ad->index_number3 }}</td>
                    </tr>
                    <tr>
                        <th>Exams Year 3:</th>
                        <td>{{ $ad->exams_year3 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        @endif

        {{-- TERTIARY DETAILS --}}
        @if($td->institution_name || $td->certificate_obtained || $td->start_year || $td->completion_year)
        <div class="row">
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col" class="text-success">
                            @if($pd->form_type === 'postgraduate')
                            E. Academic / Professional Qualifications: Undergraduate Qualification
                            @else
                            TERTIARY DETAILS
                            @endif
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Institution Name:</th>
                        <td>{{ $td->institution_name }}</td>
                        <th>Certificate Obtained:</th>
                        <td>{{ $td->certificate_obtained }}</td>
                    </tr>
                    <tr>
                        <th>Year & Month Started:</th>
                        <td>{{ $td->start_month }}, {{ $td->start_year }}</td>
                        <th>Year & Month Completed:</th>
                        <td>{{ $td->completion_month }}, {{ $td->completion_year }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if($td->institution_name2 || $td->certificate_obtained2 || $td->start_year2 || $td->completion_year2)
        <div class="row">
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col" class="text-success">
                            @if($pd->form_type === 'postgraduate')

                            Graduate Qualification (If Any)
                            @else
                            TERTIARY DETAILS
                            @endif
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Institution Name:</th>
                        <td>{{ $td->institution_name2 }}</td>
                        <th>Certificate Obtained:</th>
                        <td>{{ $td->certificate_obtained2 }}</td>
                    </tr>
                    <tr>
                        <th>Year & Month Started:</th>
                        <td>{{ $td->start_month2 }}, {{ $td->start_year2 }}</td>
                        <th>Year & Month Completed:</th>
                        <td>{{ $td->completion_month2 }}, {{ $td->completion_year2 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if($td->institution_name3 || $td->certificate_obtained3 || $td->start_year3 || $td->completion_year3)
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-success"> @if($pd->form_type === 'postgraduate')

                            Professional Qualifications (If Any):
                            @else
                            TERTIARY DETAILS
                            @endif
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Institution Name:</th>
                        <td>{{ $td->institution_name3 }}</td>
                        <th>Certificate Obtained:</th>
                        <td>{{ $td->certificate_obtained3 }}</td>
                    </tr>
                    <tr>
                        <th>Year & Month Started:</th>
                        <td>{{ $td->start_month3 }}, {{ $td->start_year3 }}</td>
                        <th>Year & Month Completed:</th>
                        <td>{{ $td->completion_month3 }}, {{ $td->completion_year3 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif


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
                        <td>
                            I declare that the information provided is genuine and reflects my true records. (An
                            applicant who makes a false declaration or withholds relevant information may be refused
                            admission. If he or she has come into the University already; he/she may be asked to withdraw)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            DATE: {{ \Carbon\Carbon::parse($created_at)->format('jS F, Y') }}
                        </td>
                        <td>
                            SIGNATURE:
                            @if (!empty($at->signature))
                            <img src="{{ asset('storage/' . $at->signature) }}" width='50px' class="rounded float-right"
                                alt="signature of applicant">
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- ENDORSEMENT DETAILS --}}
        @if($user->personalDetails->form_type != 'postgraduate')
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-success"> ENDORSEMENT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            The declaration in E. above must be endorsed below by someone of high repute. This person
                            should be a Parish Priest, Senior Public Servant or a person belonging to the learned
                            profession (e.g. Lawyer, Medical Practitioner) or a Headmaster/Principal of the applicant’s
                            last educational institution)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            DATE: {{ \Carbon\Carbon::parse($created_at)->format('jS F, Y') }}
                        </td>
                        <td>
                            SIGNATURE:
                            <img src="{{ asset('assets/logos/ceosignature.png') }}" width='50px'
                                class="rounded float-right" alt="signature of applicant">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NAME: MR. GYABAA YEBOAH EMMANUEL </br>
                            (CHIEF EXECUTIVE OFFICER, PRIORITY SOLUTIONS AGENCY)
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        {{-- REFERRAL DETAILS --}}

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-success"> Referral Details </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th> Name of Referrer: PRIORITY SOLUTIONS AGENCY</th>
                        <td> </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>

<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth(); //January is 0!
    var yyyy = today.getFullYear();

    var monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    function getOrdinalSuffix(day) {
        if (day > 3 && day < 21) return 'th'; // for 4-20
        switch (day % 10) {
            case 1:
                return "st";
            case 2:
                return "nd";
            case 3:
                return "rd";
            default:
                return "th";
        }
    }

    var formattedDate = dd + getOrdinalSuffix(dd) + ' ' + monthNames[mm] + ', ' + yyyy;

    document.getElementById("date").innerHTML = formattedDate;
    document.getElementById("ceodate").innerHTML = formattedDate;
</script>