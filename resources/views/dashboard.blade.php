<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->name }}'s | {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Welcome Message -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome, ") }} {{ auth()->user()->name }} {{ __("You're logged in.") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <section id="services" class="container py-12">
        <div class="row g-4 text-center">

            <!-- Apply For Admission Card -->
            <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="150">
                <div class="service theme-shadow p-lg-5 p-4">
                    <h2 class="mt-4 mb-3">zzzzzApply For Admission Online</h2>
                    <p>
                        Choose this section to apply for (edit your) admission online. 
                        Read instructions and ensure you have all required information available.
                    </p>
                    <a href="{{ route('personaldetails.create') }}" class="btn btn-primary">Continue (Edit) Application</a>
                    <a href="{{ route('home') }}" class="btn btn-secondary mt-2">Print Application</a>
                </div>
            </div>

            <!-- Check Application Status Card -->
            <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="250">
                <div class="service theme-shadow p-lg-5 p-4">
                    <h2 class="mt-4 mb-3">Check Your Application Status</h2>
                    <p>
                        You can easily follow up on your Application status once your online Admission Forms have been completed and submitted.
                    </p>
                    <a href="#" class="btn btn-primary">Check Status</a>
                </div>
            </div>

            <!-- Make Enquiries and Report Problems Card -->
            <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="350">
                <div class="service theme-shadow p-lg-5 p-4">
                    <h2 class="mt-4 mb-3">Make Enquiries & Report Problems</h2>
                    <p>
                        We have an active Support System ready to help answer all your questions and to address any problem.
                    </p>
                    <a href="#" class="btn btn-primary">Contact Support</a>
                    <a href="#" class="btn btn-secondary mt-2">Report Issue</a>
                </div>
            </div>

            <!-- Additional Options Card -->
            <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="450">
                <div class="service theme-shadow p-lg-5 p-4">
                    <h2 class="mt-4 mb-3">The Following Options are Available</h2>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item">
                            <a class="list-group" href="#">Fee Paying</a>
                        </li>
                        <li class="list-group-item">
                            <a class="list-group" href="#">Parallel</a>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary">Apply Here</a>
                </div>
            </div>

        </div>
    </section>
</x-app-layout>
