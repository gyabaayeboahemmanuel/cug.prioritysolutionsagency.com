@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Flyer</h1>
    </div>

    <section class="section">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

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

        <form action="{{ route('admin.flyers.update', $flyer->id) }}" method="POST" enctype="multipart/form-data" class="card p-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control" value="{{ $flyer->title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Faculty</label>
                <input name="faculty" type="text" class="form-control" value="{{ $flyer->faculty }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Programme (optional)</label>
                <input name="programme" type="text" class="form-control" value="{{ $flyer->programme }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Mode</label>
                <select name="mode" class="form-select" required>
                    <option {{ $flyer->mode == 'Regular' ? 'selected' : '' }} value="Regular">Regular</option>
                    <option {{ $flyer->mode == 'Weekend' ? 'selected' : '' }} value="Weekend">Weekend</option>
                    <option {{ $flyer->mode == 'Sandwich' ? 'selected' : '' }} value="Sandwich">Sandwich</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Description (SEO)</label>
                <textarea name="description" class="form-control" rows="3">{{ $flyer->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Flyer Image (replace if needed)</label><br>
                <img src="{{ asset('storage/' . $flyer->image_path) }}" class="img-fluid mb-2" style="max-height:150px">
                <input name="image" type="file" class="form-control">
            </div>

            <div class="form-check mb-3">
    <input type="hidden" name="is_featured" value="0">
    <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $flyer->is_featured ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_featured">
        Feature this flyer on homepage
    </label>
</div>


            <button type="submit" class="btn btn-success">Update Flyer</button>
        </form>
    </section>
</main>
@endsection
