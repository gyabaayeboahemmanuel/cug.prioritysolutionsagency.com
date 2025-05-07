@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Flyers</h1>
        <a href="{{ route('admin.flyers.create') }}" class="btn btn-primary btn-sm float-end">Upload New Flyer</a>
    </div>

    <section class="section">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Faculty</th>
                            <th>Programme</th>
                            <th>Mode</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($flyers as $flyer)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $flyer->image_path) }}" width="80" class="img-thumbnail">
                            </td>
                            <td>{{ $flyer->title }}</td>
                            <td>{{ $flyer->faculty }}</td>
                            <td>{{ $flyer->programme ?? '-' }}</td>
                            <td>{{ $flyer->mode }}</td>
                            <td>
                                @if($flyer->is_featured)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.flyers.edit', $flyer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.flyers.destroy', $flyer->id) }}" method="POST" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete flyer?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $flyers->links() }}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
