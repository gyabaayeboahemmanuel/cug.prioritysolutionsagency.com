@extends('base.base')

@section('title', 'CUG ADMISSIONS | Application')

@section('content-action')
    <a href="{{ route('admin.user.create') }}" class="btn btn-info">Add New</a>
@endsection

@section('content')
<main id="main" class="main">
<section class="section">
    {{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Error Message --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Validation Errors --}}
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

</section>
    <div class="card-body">
        <div class="table-responsive-lg">
            <p class="login-box-msg"> @include('message.flash-message') </p>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>App ID</th>
                        <th>Applicant Name</th>
                        <th>Applicant Email</th>
                        <th>Edit Form</th>
                        <th>Print Form</th>
                        <th>Print Docs</th>
                        <th>Print Docs</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applicants as $applicant)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $applicant->app_id }}</td>
                            <td>
                                @if (isset($pds[$applicant->app_id]))
                                    @foreach ($pds[$applicant->app_id] as $pd)
                                        {{ $pd->first_name }} {{ $pd->surname }}
                                    @endforeach
                                @else
                                    <span class="text-muted">No data available</span>
                                @endif
                            </td>
                            <td>{{ $applicant->contactDetails?->email_address }}</td>
                            <td>
                                <!-- Dropdown Menu for Edit Application -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Edit App
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.personal-details.edit', $applicant->app_id) }}">Personal Details</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.contact-details.edit', $applicant->app_id) }}">Contact Details</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.academic-details.edit', $applicant->app_id) }}">Academic Details</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.academic-details.edit', $applicant->app_id) }}">Programme Details</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.family-details.edit', $applicant->app_id) }}">Family Details</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.tertiary-details.edit', $applicant->app_id) }}">Tertiary Details</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <!-- <a href="{{ route('admin.application.print', $applicant->app_id) }}" class="text-green" target="_blank">
                                    Print Application
                                </a> -->
                                <a class="btn btn-primary"  href="{{ route('application.print', $applicant->app_id) }}" class="text-green" target="_blank">
                                    Print Form
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('send.email', $applicant->app_id) }}" class="btn btn-primary">Send Email</a>
                            </td>
                            <td>
                                @if (isset($at[$applicant->app_id]))
                                    @foreach ($at[$applicant->app_id] as $ats)
                                        <a href="{{ asset('storage/' . $ats->wassce_upload_url) }}" class="text-green" target="_blank">
                                            Print WASSCE
                                        </a>
                                        @if (!empty($ats->tertiarycert_upload_url))
                                            <a href="{{ Storage::url($ats->tertiarycert_upload_url) }}" class="text-green" target="_blank">
                                                Print TERTIARY
                                            </a>
                                        @endif
                                    @endforeach
                                @else
                                    <span class="text-muted">No documents available</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No applicants found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
