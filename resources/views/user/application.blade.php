@extends('user.components.base')
@section('application_active', 'active bg-gradient-primary')
@section('content')
{{-- @include('user.components.application') --}}

@if (!empty($at->app_id))
<a class="btn btn-primary " href="{{ route('application.print', auth()->user()->app_id)}}" target="_blank">VIEW / PRINT APPLICATION</a>
@endif
@endsection
