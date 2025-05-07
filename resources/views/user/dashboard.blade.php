@extends('user.components.base1')
@section('dashboard_active', 'active bg-gradient-primary')
@section('content')
    <!-- SERVICES -->
    <section id="services" class="">
        <div class="row g-4 text-center">
            
            <!-- Apply For Admission -->
            <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="150">
                <div class="service theme-shadow p-lg-5 p-4">
                    <h1 class="mt-4 mb-3">Apply For Admission Online</h1>
                    <p>
                        Choose this section to apply for (edit your) admission online. Read instructions and ensure you have
                        all required information available.
                    </p>
                    @if (empty($pd->app_id))
                        <a href="{{ route('personaldetails.create') }}" class="btn btn-primary">Start Application</a>
                    @else
                        <a href="{{ route('personaldetails.edit', auth()->user()->app_id) }}"
                            class="btn btn-primary">Continue (Edit) Application</a>
                    @endif

                    @if (!empty($at->app_id))
                        <a href="{{ route('application.print', auth()->user()->app_id) }}" class="btn btn-primary" target="_blank">Print Application</a>
                    @endif
                </div>
            </div>

            <!-- Check Application Status -->
            <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="250">
                <div class="service theme-shadow p-lg-5 p-4">
                    <h1 class="mt-4 mb-3">Check your Application Status</h1>
                    <p>You can easily follow up on your Application status once your online Admission Forms have been
                        completed and submitted.</p>
                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal">
                        Check Status
                    </button>
                </div>
            </div>

            <!-- Contact Support -->
            <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="350">
                <div class="service theme-shadow p-lg-5 p-4">
                    <h1 class="mt-4 mb-3">Want make Enquiry? Contact Support</h1>
                    <p>We are always here to support you. Click the button below to chat directly with us on WhatsApp.</p>
                    <a 
                        href="https://wa.me/233248229540?text=Hello%20Priority%20Admissions%20Office,%20I%20need%20assistance%20with%20my%20application." 
                        class="btn btn-success d-flex align-items-center justify-content-center" 
                        target="_blank">
                        <i class="bi bi-whatsapp me-2"></i> Chat on WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Modal HTML -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Check Your Admission Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Kindly check your email. The admission letter will be sent to your email once the admission office has issued you the letter.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
