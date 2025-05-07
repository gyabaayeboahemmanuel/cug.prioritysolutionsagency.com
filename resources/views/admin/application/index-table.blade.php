@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Applicants</h1>
    </div>
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
    <section class="section">
        <div class="card p-4">
            <div class="table-responsive">
                <table id="applicants-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Applicant ID</th>
                            <th>Name</th>
                            <th>Programme Offered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($details as $detail)
                            <tr>
                                <td>{{ $detail->app_id }}</td>
                                <td>{{ $detail->surname }} {{ $detail->first_name }}</td>
                                <td>{{ $detail->program_of_choice }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No applicants found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<!-- Include DataTables JS and CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#applicants-table').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthChange: true,
            language: {
                search: "Search Applicants:",
                lengthMenu: "Show _MENU_ entries per page",
                zeroRecords: "No matching applicants found",
                info: "Showing page _PAGE_ of _PAGES_",
                infoEmpty: "No records available",
                infoFiltered: "(filtered from _MAX_ total records)"
            }
        });
    });
</script>
@endsection
