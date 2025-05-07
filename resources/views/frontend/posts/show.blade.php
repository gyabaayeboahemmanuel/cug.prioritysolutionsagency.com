@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', Str::limit(strip_tags($post->content), 150))

@section('content')
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <!-- Main Post Content -->
            <div class="col-lg-8">
                <article class="bg-white p-4 shadow-sm rounded">
                    <h1 class="mb-3 text-uppercase fw-bold">{{ $post->title }}</h1>
                    <p class="text-muted small mb-4">Published on {{ $post->created_at->format('F j, Y') }}</p>

                    @if($post->image_path)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="img-fluid rounded">
                        </div>
                    @endif

                    <div class="content fs-5 lh-lg">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    <!-- Call to Action -->
                    <div class="mt-5 text-center">
                        <p class="fw-semibold">Find this helpful? Share or apply now!</p>
                        <a href="{{ route('register') }}" class="btn btn-brand btn-lg">Apply Now</a>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Recent Posts -->
                <div class="bg-white p-4 mb-4 shadow-sm rounded">
                    <h5 class="fw-bold">Recent Posts</h5>
                    <ul class="list-unstyled">
                        @foreach($recentPosts as $recent)
                            <li class="mb-2">
                                <a href="{{ route('frontend.posts.show', $recent->slug) }}" class="text-decoration-none">
                                    {{ Str::limit($recent->title, 60) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Tags (Optional) -->
                {{-- If you implement tags --}}
                {{-- <div class="bg-white p-4 shadow-sm rounded">
                    <h5 class="fw-bold">Tags</h5>
                    <div>
                        @foreach($post->tags as $tag)
                            <a href="#" class="badge bg-secondary text-white me-1">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection
