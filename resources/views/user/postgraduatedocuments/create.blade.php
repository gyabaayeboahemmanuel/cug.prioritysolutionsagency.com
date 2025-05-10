@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('document_active', 'active bg-gradient-secondary')
@section('dtext', 'text-white')

<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('postgraduatedocuments.store') }}" method="post" class="row g-3 shadow p-4 bg-white rounded">
        <input type="hidden" name="app_id" readonly id="app_id" value="{{ auth()->user()->app_id }}">
        @csrf
        @method('POST')

        <h4 class="mb-4">Postgraduate Document Upload</h4>

        <div class="col-md-6">
            <label for="document_type" class="form-label">Document Type</label>
            <input type="text" class="form-control" id="document_type" name="document_type" required>
        </div>

        <div class="col-md-6">
            <label for="upload_url" class="form-label">Upload URL</label>
            <input type="text" class="form-control" id="upload_url" name="upload_url" required>
        </div>

        <div class="col-12 d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">
                Save and Upload <i class="material-icons">save</i>
            </button>
        </div>
    </form>
</div>
@endsection
