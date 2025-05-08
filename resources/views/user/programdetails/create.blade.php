@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
@section('programme_active', 'active bg-gradient-secondary')
@section('pgtext','text-white')
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
        <form action="{{ route('programdetails.store') }}" method="post" class="row g-3">
            @csrf
            @method('POST')
        <input type="hidden" name="app_id" readonly id="app_id" value="{{auth()->user()->app_id}}">

            <h1>Program Details</h1>
            <div class="col-md-12">
                <label for="program" class="form-label">Select Admission Period</label>
                <select class="form-select" id="program" name="program" required>
                    <option value="">Select Admission Period</option>
                    <option value="August/September">August/September(Reg/Wk) </option>
                    <option value="January/February">January/February(Reg/Wk)</option>
                    <option value="June/July">June/July(Sandwich)</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="program_of_choice" class="form-label">Program of Choice</label>
                <select class="form-select" id="program_of_choice" name="program_of_choice" required>
                    @foreach($programmes as $programme)
                    <option value="{{$programme->programme_title}}">{{$programme->programme_title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="streams" class="form-label">Streams</label>
                <select class="form-select" id="streams" name="streams" required>
                    <option value="">Select Streams</option>
                    <option value="Weekend">Weekend</option>
                    <option value="Regular">Regular</option>
                    <option value="Sandwich">Sandwich</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save and Continue</button>
            </div>
        </form>
    </div>
@endsection