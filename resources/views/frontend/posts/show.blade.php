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
                        {!! $post->content !!}
                    </div>

                    <!-- Social Share Buttons -->
                    <div class="mt-4">
                        <h5 class="fw-bold mb-3">Share this post:</h5>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" 
                               target="_blank" class="btn btn-primary">
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{ urlencode($post->title) }}" 
                               target="_blank" class="btn btn-info">
                                Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . Request::url()) }}" 
                               target="_blank" class="btn btn-success">
                                WhatsApp
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(Request::url()) }}" 
                               target="_blank" class="btn btn-secondary">
                                LinkedIn
                            </a>
                        </div>
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
                <!-- Search Bar -->
                <div class="bg-white p-3 mb-4 shadow-sm rounded">
                    <input type="text" id="search-recent-posts" class="form-control" placeholder="Search recent posts...">
                </div>

                <!-- Recent Posts -->
                <div class="bg-white p-4 mb-4 shadow-sm rounded">
                    <h5 class="fw-bold">Recent Posts</h5>
                    <ul class="list-unstyled" id="recent-posts-list">
                        @foreach($recentPosts as $recent)
                            <li class="mb-3 hover-zoom">
                                <div class="d-flex align-items-center">
                                    @if($recent->image_path)
                                        <img src="{{ asset('storage/' . $recent->image_path) }}" 
                                             alt="{{ $recent->title }}" 
                                             class="me-3 rounded"
                                             loading="lazy"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" 
                                             alt="No Image" 
                                             class="me-3 rounded"
                                             loading="lazy"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @endif
                                    <div>
                                        <a href="{{ route('frontend.posts.show', $recent->slug) }}" class="text-decoration-none text-dark fw-bold">
                                            {{ Str::limit($recent->title, 60) }}
                                        </a>
                                        <p class="text-muted small mb-0">{{ $recent->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search Filter Logic -->
<script>
    document.getElementById('search-recent-posts').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const posts = document.querySelectorAll('#recent-posts-list li');

        posts.forEach(post => {
            const title = post.querySelector('a').innerText.toLowerCase();
            if (title.includes(searchTerm)) {
                post.style.display = 'block';
            } else {
                post.style.display = 'none';
            }
        });
    });
</script>

<!-- Hover CSS -->
<style>
    .hover-zoom:hover {
        background-color: #f9f9f9;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
</style>
@endsection
