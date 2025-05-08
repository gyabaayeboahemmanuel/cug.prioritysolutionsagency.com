@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Post</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Edit</li>
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

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Post Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>

            <!-- Post Content -->
            <div class="mb-3">
                <label for="content" class="form-label">Post Content</label>
                <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <!-- Current Image Preview -->
            <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                @if($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="img-thumbnail" style="max-width: 200px;">
                @else
                <p class="text-muted">No image uploaded</p>
                @endif
            </div>

            <!-- Change Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Change Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <!-- Publish Status -->
            <div class="mb-3">
                <label for="is_published" class="form-label">Publish Status</label>
                <select name="is_published" class="form-control">
                    <option value="0" {{ $post->is_published == 0 ? 'selected' : '' }}>Draft</option>
                    <option value="1" {{ $post->is_published == 1 ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <!-- Publish Date -->
            <div class="mb-3">
                <label for="published_at" class="form-label">Publish Date</label>
                <input
                    type="datetime-local"
                    name="published_at"
                    class="form-control"
                    value="{{ old('published_at', $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}">

            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Update Post</button>
            </div>
        </form>
    </section>
</main>

<!-- Include CKEditor -->
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
@endsection