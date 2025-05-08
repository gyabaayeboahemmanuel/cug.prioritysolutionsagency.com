@extends('base.base')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Google Search Analytics</h1>

    </div>
<div class="container mt-5">
<h3>Google Search Analytics</h3>
    <!-- Chart Display -->
    <canvas id="referralChart" width="400" height="200"></canvas>

    <div class="row mt-5">
        <div class="col-md-12">
            <h5>Recent Google Referrals:</h5>
            <ul class="list-group">
                @foreach(DB::table('google_referrals')->latest()->take(10)->get() as $referral)
                    <li class="list-group-item">
                        <strong>Visited URL:</strong> 
                        <a href="{{ $referral->url }}" target="_blank">{{ $referral->url }}</a>
                        <span class="text-muted float-end">{{ $referral->created_at->diffForHumans() }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Chart Logic -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json($labels);
    const counts = @json($counts);

    const ctx = document.getElementById('referralChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Google Search Referrals',
                data: counts,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</main><!-- End #main -->
@endsection
