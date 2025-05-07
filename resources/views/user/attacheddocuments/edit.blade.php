@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('attached_active','active bg-gradient-secondary ')
@section('attext','text-white')

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
    
    <form action="{{ route('attacheddocuments.update', auth()->user()->app_id) }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf
        @method('PATCH') 
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">

        <h1>Upload Attached Documents</h1>

        <!-- Ghana Card -->
        <div class="col-md-6">
            <label for="ghanacard_upload_url" class="form-label">Ghana Card</label>
            <br>
            <input type="file" class="form-control" id="ghanacard_upload_url" name="ghanacard_upload_url">
            @if ($atd->ghanacard_upload_url)
                <a target="_blank" href="{{ asset('storage/' . $atd->ghanacard_upload_url) }}">VIEW GHANA CARD</a>
            @endif
        </div>

        <!-- Birth Certificate -->
        <div class="col-md-6">
            <label for="birthcert_upload_url" class="form-label">Birth Certificate</label>
            <br>
            <input type="file" class="form-control" id="birthcert_upload_url" name="birthcert_upload_url">
            @if ($atd->birthcert_upload_url)
                <a target="_blank" href="{{ asset('storage/' . $atd->birthcert_upload_url) }}">VIEW BIRTH CERTIFICATE</a>
            @endif
        </div>

        <!-- Signature -->
        <div class="col-md-6">
            <label for="signature" class="form-label">Signature Upload</label>
            <br>
            <input type="file" class="form-control" id="signature" name="signature">
            @if ($atd->signature)
                <a target="_blank" href="{{ asset('storage/' . $atd->signature) }}">VIEW SIGNATURE</a>
            @endif
        </div>

        <!-- WASSCE Result -->
        <div class="col-md-6">
            <label for="wassce_upload_url" class="form-label">WASSCE Result</label>
            <br>
            <input type="file" class="form-control" id="wassce_upload_url" name="wassce_upload_url">
            @if ($atd->wassce_upload_url)
                <a target="_blank" href="{{ asset('storage/' . $atd->wassce_upload_url) }}">VIEW WASSCE RESULT</a>
            @endif
        </div>

        <!-- Second WASSCE Result -->
        <div class="col-md-6">
            <label for="wassce2_upload_url" class="form-label">Second WASSCE Result</label>
            <br>
            <input type="file" class="form-control" id="wassce2_upload_url" name="wassce2_upload_url">
            @if ($atd->wassce2_upload_url)
                <a target="_blank" href="{{ asset('storage/' . $atd->wassce2_upload_url) }}">VIEW SECOND WASSCE RESULT</a>
            @endif
        </div>

        <!-- Third WASSCE Result -->
        <div class="col-md-6">
            <label for="wassce3_upload_url" class="form-label">Third WASSCE Result</label>
            <br>
            <input type="file" class="form-control" id="wassce3_upload_url" name="wassce3_upload_url">
            @if ($atd->wassce3_upload_url)
                <a target="_blank" href="{{ asset('storage/' . $atd->wassce3_upload_url) }}">VIEW THIRD WASSCE RESULT</a>
            @endif
        </div>

        <!-- Tertiary Institution Certificate -->
        <div class="col-md-6">
            <label for="tertiarycert_upload_url" class="form-label">Tertiary Institution Certificate</label>
            <br>
            <input type="file" class="form-control" id="tertiarycert_upload_url" name="tertiarycert_upload_url">
            @if ($atd->tertiarycert_upload_url)
                <a target="_blank" href="{{ asset('storage/' . $atd->tertiarycert_upload_url) }}">VIEW TERTIARY CERTIFICATE</a>
            @endif
        </div>

        <!-- Save Button -->
        <div class="col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Save and Continue</button>
        </div>
    </form>

    <!-- Navigation Buttons -->
    <div class="row mt-4">
        <div class="col-md-6">
            @if (!empty($td->app_id))
                <a class="btn btn-secondary" href="{{ route('tertiarydetails.edit', $td->app_id) }}">← Previous</a>
            @else
                <a class="btn btn-secondary disabled" href="#">← Previous</a>
            @endif
        </div>

        <div class="col-md-6 text-end">
            @if (empty($atd->app_id))
                <a class="btn btn-primary" href="{{ route('attacheddocuments.create') }}">Next →</a>
            @else
                <a class="btn btn-primary" href="{{ route('application.summary', auth()->user()->app_id) }}">Next →</a>
            @endif
        </div>
    </div>
</div>

@endsection
