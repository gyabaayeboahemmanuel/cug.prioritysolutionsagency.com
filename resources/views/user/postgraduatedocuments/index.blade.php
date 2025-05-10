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

    <h4 class="mb-4">Uploaded Postgraduate Documents</h4>

    <!-- Button to trigger modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addDocumentModal">
        Add Document
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Document Type</th>
                <th>File URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postgraduateDocuments as $document)
            <tr id="document-{{ $document->id }}">
                <td>{{ $document->document_type }}</td>
                <td><a href="{{ asset('storage/' . $document->upload_url) }}" target="_blank">View Document</a></td>
                <td>
                    <button class="btn btn-danger btn-sm deleteDocument" data-id="{{ $document->id }}">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Navigation Buttons -->
    <div class="d-flex justify-content-between mt-4">
        <!-- Previous Button -->
        @if(strtolower($pd->form_type) == 'postgraduate')
            <a href="{{ route('tertiarydetails.edit', $td->app_id) }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Previous (Academic Details)
            </a>
        @else
            <a href="{{ route('attacheddocuments.edit', $at->app_id) }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Previous (Attached Documents)
            </a>
        @endif
        
        <!-- Next Button -->
        <a href="{{ route('application.summary', auth()->user()->app_id) }}" class="btn btn-success">
            Next (Summary) <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</div>

<!-- Modal Form for Adding Document -->
<div class="modal fade" id="addDocumentModal" tabindex="-1" aria-labelledby="addDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addDocumentForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocumentModalLabel">Add New Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="document_type" class="form-label">Document Type</label>
                        <input type="text" class="form-control" id="document_type" name="document_type" required>
                    </div>
                    <div class="mb-3">
                        <label for="upload_url" class="form-label">Upload Document</label>
                        <input type="file" class="form-control" id="upload_url" name="upload_url" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Document</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Handle form submission for adding document
    $('#addDocumentForm').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('app_id', "{{ auth()->user()->app_id }}");

        $.ajax({
            url: "{{ route('postgraduatedocuments.store') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert('Document added successfully!');
                $('#addDocumentModal').modal('hide');
                location.reload();
            },
            error: function (xhr) {
                alert('Failed to add document. Please try again.');
            }
        });
    });

    // Handle delete button
    $('.deleteDocument').click(function () {
        if (confirm('Are you sure you want to delete this document?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '/postgraduatedocuments/' + id,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    alert('Document deleted successfully!');
                    $('#document-' + id).remove();
                },
                error: function () {
                    alert('Failed to delete document.');
                }
            });
        }
    });
</script>

@endsection
