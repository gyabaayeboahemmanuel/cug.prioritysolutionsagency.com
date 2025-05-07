@extends('layouts.admin')

@section('content')
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
    <h1>Edit Family Details for {{ $fd->app_id }}</h1>
    <form action="{{ route('admin.family-details.update', $fd->app_id) }}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="app_id" readonly id="app_id" value="{{$fd->app_id}}">

        <div class="form-group">
            <label for="father_full_name">Father's Full Name</label>
            <input type="text" name="father_full_name" id="father_full_name" class="form-control" value="{{ old('father_full_name', $fd->father_full_name) }}" required>
        </div>

        <div class="form-group">
            <label for="father_status">Father's Status</label>
            <input type="text" name="father_status" id="father_status" class="form-control" value="{{ old('father_status', $fd->father_status) }}" required>
        </div>

        <div class="form-group">
            <label for="father_contact">Father's Contact</label>
            <input type="text" name="father_contact" id="father_contact" class="form-control" value="{{ old('father_contact', $fd->father_contact) }}">
        </div>

        <div class="form-group">
            <label for="father_occupation">Father's Occupation</label>
            <input type="text" name="father_occupation" id="father_occupation" class="form-control" value="{{ old('father_occupation', $fd->father_occupation) }}">
        </div>

        <div class="form-group">
            <label for="mother_full_name">Mother's Full Name</label>
            <input type="text" name="mother_full_name" id="mother_full_name" class="form-control" value="{{ old('mother_full_name', $fd->mother_full_name) }}" required>
        </div>

        <div class="form-group">
            <label for="mother_status">Mother's Status</label>
            <input type="text" name="mother_status" id="mother_status" class="form-control" value="{{ old('mother_status', $fd->mother_status) }}" required>
        </div>

        <div class="form-group">
            <label for="mother_address">Mother's Address</label>
            <input type="text" name="mother_address" id="mother_address" class="form-control" value="{{ old('mother_address', $fd->mother_address) }}">
        </div>

        <div class="form-group">
            <label for="mother_contact">Mother's Contact</label>
            <input type="text" name="mother_contact" id="mother_contact" class="form-control" value="{{ old('mother_contact', $fd->mother_contact) }}">
        </div>

        <div class="form-group">
            <label for="mother_occupation">Mother's Occupation</label>
            <input type="text" name="mother_occupation" id="mother_occupation" class="form-control" value="{{ old('mother_occupation', $fd->mother_occupation) }}">
        </div>

        <div class="form-group">
            <label for="guardian_name">Guardian's Name</label>
            <input type="text" name="guardian_name" id="guardian_name" class="form-control" value="{{ old('guardian_name', $fd->guardian_name) }}">
        </div>

        <div class="form-group">
            <label for="relation_to_applicant">Relation to Applicant</label>
            <input type="text" name="relation_to_applicant" id="relation_to_applicant" class="form-control" value="{{ old('relation_to_applicant', $fd->relation_to_applicant) }}">
        </div>

        <div class="form-group">
            <label for="guardian_address">Guardian's Address</label>
            <input type="text" name="guardian_address" id="guardian_address" class="form-control" value="{{ old('guardian_address', $fd->guardian_address) }}">
        </div>

        <div class="form-group">
            <label for="guardian_occupation">Guardian's Occupation</label>
            <input type="text" name="guardian_occupation" id="guardian_occupation" class="form-control" value="{{ old('guardian_occupation', $fd->guardian_occupation) }}">
        </div>

        <div class="form-group">
            <label for="guardian_phone_number">Guardian's Phone Number</label>
            <input type="text" name="guardian_phone_number" id="guardian_phone_number" class="form-control" value="{{ old('guardian_phone_number', $fd->guardian_phone_number) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Family Details</button>
    </form>
@endsection
