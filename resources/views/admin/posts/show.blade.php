@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{ $post->title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body pt-4">
                <h5 class="card-title">{{ $post->title }}</h5>

                @if($post->image_path)
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="img-fluid mb-3" style="max-height: 300px;">
                @endif

                <p class="text-muted">
                    <small>Posted on {{ $post->created_at->format('F j, Y') }}</small>
                </p>

                <div>
                    {!! nl2br(e($post->content)) !!}
                </div>

                <hr>

                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-sm">Back to All Posts</a>
            </div>
        </div>
    </section>
</main>
@endsection
