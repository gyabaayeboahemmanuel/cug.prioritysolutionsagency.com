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

    <h4 class="mb-4">Uploaded Documents</h4>

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
                <td><a href="{{ $document->upload_url }}" target="_blank">View Document</a></td>
                <td>
                    <button class="btn btn-warning btn-sm editDocument" data-id="{{ $document->id }}" data-type="{{ $document->document_type }}" data-url="{{ $document->upload_url }}">
                        Edit
                    </button>
                    <button class="btn btn-danger btn-sm deleteDocument" data-id="{{ $document->id }}">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Form for Edit -->
<div class="modal fade" id="editDocumentModal" tabindex="-1" aria-labelledby="editDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editDocumentForm">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="editDocumentModalLabel">Edit Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="document_id" name="document_id">
                    <div class="mb-3">
                        <label for="document_type" class="form-label">Document Type</label>
                        <input type="text" class="form-control" id="document_type" name="document_type">
                    </div>
                    <div class="mb-3">
                        <label for="upload_url" class="form-label">Upload URL</label>
                        <input type="text" class="form-control" id="upload_url" name="upload_url">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Open the modal and populate data
        $('.editDocument').click(function () {
            $('#document_id').val($(this).data('id'));
            $('#document_type').val($(this).data('type'));
            $('#upload_url').val($(this).data('url'));
            $('#editDocumentModal').modal('show');
        });

        // Submit the form with AJAX
        $('#editDocumentForm').submit(function (e) {
            e.preventDefault();
            var id = $('#document_id').val();
            $.ajax({
                url: '/postgraduatedocuments/' + id,
                type: 'PATCH',
                data: {
                    _token: $('input[name=_token]').val(),
                    document_type: $('#document_type').val(),
                    upload_url: $('#upload_url').val()
                },
                success: function (response) {
                    alert('Document updated successfully!');
                    $('#editDocumentModal').modal('hide');
                    location.reload();
                }
            });
        });

        // Delete Document
        $('.deleteDocument').click(function () {
            if (confirm('Are you sure you want to delete this document?')) {
                var id = $(this).data('id');
                $.ajax({
                    url: '/postgraduatedocuments/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $('input[name=_token]').val()
                    },
                    success: function (response) {
                        alert('Document deleted successfully!');
                        $('#document-' + id).remove();
                    }
                });
            }
        });
    });
</script>

@endsection