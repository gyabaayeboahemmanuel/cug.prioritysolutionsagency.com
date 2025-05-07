@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Generate Vouchers</h1>
    </div>

    <section class="section">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body pt-4">
                <form action="{{ route('admin.vouchers.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Number of Vouchers to Generate</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Generate</button>
                </form>
            </div>
        </div>

        @if(isset($vouchers) && count($vouchers))
        <div class="card mt-4">
            <div class="card-header">Recently Generated Vouchers</div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Voucher Code</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vouchers as $index => $voucher)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $voucher->code }}</td>
                                <td>
                                    @if($voucher->claimed_by)
                                        <span class="badge bg-success">Used</span>
                                    @else
                                        <span class="badge bg-secondary">Unused</span>
                                    @endif
                                </td>
                                <td>{{ $voucher->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </section>
</main>
@endsection
