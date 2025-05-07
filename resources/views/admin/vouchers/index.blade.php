@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Vouchers</h1>
        <a href="{{ route('admin.vouchers.create') }}" class="btn btn-primary btn-sm float-end">Generate New Vouchers</a>
    </div>

    <section class="section">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Voucher Code</th>
                            <th>Claimed By</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vouchers as $index => $voucher)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $voucher->code }}</td>
                            <td>{{ $voucher->claimed_by ?? '—' }}</td>
                            <td>
                                @if($voucher->claimed_by)
                                    <span class="badge bg-success">Used</span>
                                @else
                                    <span class="badge bg-secondary">Unused</span>
                                @endif
                            </td>
                            <td>{{ $voucher->created_at->format('d M Y') }}</td>
                            <td>
                                <form action="{{ route('admin.vouchers.destroy', $voucher->id) }}" method="POST" onsubmit="return confirm('Delete this voucher?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $vouchers->links() }}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
