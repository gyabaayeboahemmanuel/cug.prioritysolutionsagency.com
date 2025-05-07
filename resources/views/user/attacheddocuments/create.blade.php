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
        
        <form action="{{ route('attacheddocuments.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" name="app_id" readonly id="app_id" value="{{auth()->user()->app_id}}">
        
            <h1>Upload Attached Documents</h1>
        
            <!-- Document Uploads -->
            <div class="col-md-6">
                <label for="ghanacard_upload_url" class="form-label">Ghana Card</label>
                <br>
                <input type="file" class="form-control" id="ghanacard_upload_url" name="ghanacard_upload_url" >
            </div>
            <div class="col-md-6">
                <label for="birthcert_upload_url" class="form-label">Birth Certificate</label>
                <br>
                <input type="file" class="form-control" id="birthcert_upload_url" name="birthcert_upload_url" >
            </div>            
            <div class="col-md-6">
                <label for="signature" class="form-label">Signature Upload</label>
                <br>
                <input type="file" class="form-control" id="signature" name="signature" required>
            </div>
            <div class="col-md-6">
                <label for="wassce_upload_url" class="form-label">WASSCE Result</label>
                <br>
                <input type="file" class="form-control" id="wassce_upload_url" name="wassce_upload_url" >
            </div>
            <div class="col-md-4">
                <label for="wassce2_upload_url" class="form-label">Second WASSCE Result </label>
                <br>
                <input type="file" class="form-control" id="wassce2_upload_url" name="wassce2_upload_url">
            </div>
            <div class="col-md-4">
                <label for="wassce3_upload_url" class="form-label">Third WASSCE Result</label>
                <br>
                <input type="file" class="form-control" id="wassce3_upload_url" name="wassce3_upload_url">
            </div>
            <div class="col-md-4">
                <label for="tertiarycert_upload_url" class="form-label">Tertiary Institution Certificate</label>
                <br>
                <input type="file" class="form-control" id="tertiarycert_upload_url" name="tertiarycert_upload_url">
            </div>
        
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Save and Continue</button>
            </div>
        </form>
        
    </div>

@endsection