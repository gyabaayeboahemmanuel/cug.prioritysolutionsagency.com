@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>All Posts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">+ New Post</a>
        </div>

        <div class="card">
            <div class="card-body pt-4">
                @if($posts->count())
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $index => $post)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <p>
                                                {!! implode('. ', array_slice(explode('.', strip_tags($post->content)), 0, 5)) !!}
                                                @if(count(explode('.', strip_tags($post->content))) > 5)
                                                    ...
                                                @endif
                                            </p>
                                        </td>

                                        <td>
                                            @if($post->image_path)
                                                <img src="{{ asset('storage/' . $post->image_path) }}" 
                                                     alt="Post Image" 
                                                     style="max-height: 60px;" 
                                                     onerror="this.onerror=null; this.src='{{ asset('images/no-image.png')}}';">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>

                                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $posts->links('vendor.pagination.bootstrap-5') }}
                    </div>
                @else
                    <p class="text-muted">No posts available.</p>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection
