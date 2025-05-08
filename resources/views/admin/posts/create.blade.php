@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Create New Post</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Post Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Post Content</label>
        <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <label for="is_published" class="form-label">Publish Post</label>
        <select name="is_published" class="form-control">
            <option value="0">Draft</option>
            <option value="1">Publish Now</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="published_at" class="form-label">Publish Date</label>
        <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at') }}">
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Publish Post</button>
    </div>
</form>

<!-- Include CKEditor -->
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        height: 300,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
            { name: 'insert', items: ['Image', 'Table', 'HorizontalRule'] },
            { name: 'styles', items: ['Styles', 'Format'] },
            { name: 'editing', items: ['Scayt'] },
            { name: 'links', items: ['Link', 'Unlink'] }
        ],
        removePlugins: 'elementspath',
        resize_enabled: false
    });
</script>

    </section>
</main>
@endsection
