@extends('admin.components.base')
@section('title', 'CUG ADMISSIONS | PROGRAMMES ')
@section ('content-action')
<a href="{{ route('programme.create') }}" class="btn btn-info">Add New</a>
@endsection

@section ('content')

<div class="card-body">
    <div class="table-responsive-lg">
        <table>
            <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Type</th>
            </tr>    
            </thead>
            <tbody>
                @foreach($programmes as $programme)
            <tr>
                <th>
                    {{ $programme->id}}
                </th>
                <td>
                    {{$programme->programme_title}}
                </td>
                <td>
                    {{$programme->programme_type}}
                </td>
                <td>
                    {{-- <img src="{{ $user->photo }}" alt="user profile image">  --}}
                </td>
            

            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
