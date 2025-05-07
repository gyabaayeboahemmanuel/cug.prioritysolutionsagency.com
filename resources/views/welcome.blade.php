<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catholic University of Ghana - Priority Admissions Office</title>
    <meta name="description" content="Apply for admission to Catholic University of Ghana through the official Priority Admissions Office, operated under Priority Solutions Agency (PSA). Fast, secure and trusted." />
    <meta name="keywords" content="Catholic University of Ghana, CUG Admissions, Ghana universities, Priority Admissions, PSA Portal" />
    <script src="https://cdn.jsdelivr.net/npm/countup.js@2.0.7/dist/countUp.min.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('asserts/css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            {{-- <a class="navbar-brand" href="#">
                <img src="{{ asset('asserts/images/logo-dark.svg') }}" alt="">
            <img src="{{ asset('asserts/images/school-logo.png') }}" alt="">
            </a> --}}


            <div style="width: 50px; height: 50px; overflow: hidden;">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('asserts/images/school-logo.png') }}" alt="Catholic uNiversity of Ghana logo" style="width: 50px; height: 50px;">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faculties">Programmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                </ul>
                {{-- <a href="#" class="btn btn-brand ms-lg-3">Download</a> --}}
                <div>
                    @if (\Illuminate\Support\Facades\Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                        <a class="btn btn-brand ms-lg-3"
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                        @else

                        <a class="btn btn-brand ms-lg-3"
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>

                        @if (\Illuminate\Support\Facades\Route::has('register'))
                        <a class="btn btn-brand ms-lg-3"
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Apply Now
                        </a>
                        @endif
                        @endauth
                    </nav>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <section id="hero" class="min-vh-100 d-flex align-items-center text-center bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p data-aos="fade-left" class="text-uppercase lead fw-semibold display-4">
                        Catholic University of Ghana
</p>
                    <p data-aos="fade-up" data-aos-delay="100" class="lead mt-3 mb-4">
                        Welcome to the <strong>Priority Admissions Office</strong><br>
                        — your official portal for applying to CUG.
                    </p>
                    <p class="small text-muted fst-italic" data-aos="fade-up" data-aos-delay="200">
                        Operated under official partnership with the Catholic University of Ghana Admissions Directorate through Priority Solutions Agency (PSA)
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-brand btn-lg mt-3" data-aos="fade-up" data-aos-delay="300">
                        Apply Now
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="50">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">About Us</h1>
                        <div class="line"></div>
                        <p>
                            The <strong>Catholic University of Ghana (CUG)</strong> was established in 2003 by the Ghana Catholic Bishops' Conference with a mission to deliver holistic and quality education grounded in Christian values.
                            This Priority Admissions Portal is managed by <strong>Priority Solutions Agency (PSA)</strong> in official partnership with CUG to assist applicants in gaining seamless access to all admission opportunities.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6" data-aos="fade-down" data-aos-delay="50">
                    <img src="{{ asset('asserts/images/11.jpg') }}" alt="Catholic University of Ghana Campus" class="img-fluid rounded shadow">
                </div>
                <div data-aos="fade-down" data-aos-delay="150" class="col-lg-5">
                    <h2 class="fw-semibold">Mission and Vision</h2>
                    <div class="line1"></div>

                    <div class="d-flex pt-4 mb-3">
                        <div class="iconbox me-4">
                            <i class="ri-user-5-fill"></i>
                        </div>
                        <div>
                            <h5>Mission</h5>
                            <div class="line2"></div>
                            <p>
                                The mission of CUG is to provide a dynamic learning environment that promotes ethical leadership, academic excellence, and innovation. The university is committed to shaping future leaders with integrity and a sense of responsibility.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="iconbox me-4">
                            <i class="ri-rocket-2-fill"></i>
                        </div>
                        <div>
                            <h5>Vision</h5>
                            <div class="line2"></div>
                            <p>
                                CUG aspires to be a distinguished academic institution in Africa, recognized for its strong moral foundation, exceptional research, community service, and commitment to nation-building through education.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SERVICES -->
    <section id="services" class="section-padding border-top">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Our Admissions Support Services</h1>
                        <div class="line"></div>
                        <p>
                            Explore how we support prospective students and applicants with tailored services under our official CUG admissions partnership.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4 text-center">
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="150">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-edit-box-line"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Form Sales & Application Guidance</h5>
                        <p>Purchase admission forms and receive clear step-by-step guidance throughout your application process.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="250">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-user-voice-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Admissions Consultation</h5>
                        <p>Not sure which program to choose? We help you select the best path based on your career goals and background.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="350">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-group-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Programme Eligibility Check</h5>
                        <p>We verify your qualifications to recommend the most suitable programmes across Regular, Weekend, or Sandwich options.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="450">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-global-line"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Online Application Support</h5>
                        <p>Complete your application entirely online with full support from our team whenever you need it.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="550">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-phone-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Phone & WhatsApp Support</h5>
                        <p>Get fast help and answers through our dedicated contact line and WhatsApp admissions desk.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="650">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-shield-check-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Verified Agent Portal</h5>
                        <p>All submitted applications through our portal are securely routed to the University Admissions Directorate with a verification printout.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COUNTER -->
    <section id="counter" class="section-padding bg-dark text-white">
        <div class="container text-center">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                    <h1 class="display-4">7,500+</h1>
                    <h6 class="text-uppercase mt-3">Forms Issued</h6>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-delay="250">
                    <h1 class="display-4">5,800+</h1>
                    <h6 class="text-uppercase mt-3">Verified Applicants</h6>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-delay="350">
                    <h1 class="display-4">21</h1>
                    <h6 class="text-uppercase mt-3">Programmes Available</h6>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-delay="450">
                    <h1 class="display-4">2</h1>
                    <h6 class="text-uppercase mt-3">Application Channels</h6>
                </div>
            </div>
        </div>
    </section>

    <!-- FACULTIES SECTION -->
    <section id="faculties" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="50">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Explore Our Faculties</h1>
                        <div class="line"></div>
                        <p>Discover the diverse academic offerings across our faculties.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">

                <!-- Faculty of Economic and Business Administration -->
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100">
                        <img src="assets/images/faculty-business.jpg" class="card-img-top" alt="Business Faculty">
                        <div class="card-body">
                            <h5 class="card-title">Economic & Business Administration</h5>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#businessPrograms">View Programs</button>
                            <div class="collapse mt-3" id="businessPrograms">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">BSc Accounting</li>
                                    <li class="list-group-item">BSc Banking and Finance</li>
                                    <li class="list-group-item">BSc Economics</li>
                                    <li class="list-group-item">BSc Human Resource Management</li>
                                    <li class="list-group-item">BSc Management</li>
                                    <li class="list-group-item">BSc Management & Org. Development</li>
                                    <li class="list-group-item">BSc Marketing</li>
                                    <li class="list-group-item">BSc Procurement & Supply Chain Mgmt</li>
                                    <li class="list-group-item">MBA Accounting</li>
                                    <li class="list-group-item">MBA Finance</li>
                                    <li class="list-group-item">MBA HR Management</li>
                                    <li class="list-group-item">MBA Marketing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Faculty of Information & Communication Sciences and Technology -->
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100">
                        <img src="assets/images/faculty-ict.jpg" class="card-img-top" alt="ICT Faculty">
                        <div class="card-body">
                            <h5 class="card-title">Information & Comm. Sciences and Tech.</h5>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#ictPrograms">View Programs</button>
                            <div class="collapse mt-3" id="ictPrograms">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">BSc Business Analytics</li>
                                    <li class="list-group-item">BSc Computer Science</li>
                                    <li class="list-group-item">BSc Information Technology</li>
                                    <li class="list-group-item">MSc Data Science</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Faculty of Religions and Social Sciences -->
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100">
                        <img src="assets/images/faculty-religion.jpg" class="card-img-top" alt="Religion Faculty">
                        <div class="card-body">
                            <h5 class="card-title">Religions and Social Sciences</h5>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#religionPrograms">View Programs</button>
                            <div class="collapse mt-3" id="religionPrograms">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">BA Religious Studies</li>
                                    <li class="list-group-item">Certificate in English Language</li>
                                    <li class="list-group-item">Certificate in French Language</li>
                                    <li class="list-group-item">MA Religious Studies & Pastoral Ministry</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- School of Public Health and Allied Sciences -->
<div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
    <div class="card h-100">
        <img src="assets/images/faculty-health.jpg" class="card-img-top" alt="Public Health and Allied Sciences">
        <div class="card-body">
            <h5 class="card-title">School of Public Health and Allied Sciences</h5>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#publicHealthPrograms">View Programs</button>
            <div class="collapse mt-3" id="publicHealthPrograms">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">BSc Public Health (Health Promotion and Education)</li>
                    <li class="list-group-item">BSc Public Health (Disease Control)</li>
                    <li class="list-group-item">BSc Public Health (Environmental Health)</li>
                    <li class="list-group-item">BSc Public Health (Health Information Management)</li>
                    <li class="list-group-item">BSc Physiotherapy</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- School of Nursing and Midwifery -->
<div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="600">
    <div class="card h-100">
        <img src="assets/images/faculty-nursing.jpg" class="card-img-top" alt="Nursing and Midwifery">
        <div class="card-body">
            <h5 class="card-title">School of Nursing and Midwifery</h5>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#nursingPrograms">View Programs</button>
            <div class="collapse mt-3" id="nursingPrograms">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">BSc Nursing</li>
                    <li class="list-group-item">BSc Midwifery</li>
                    <li class="list-group-item">BSc Public Health Nursing</li>
                </ul>
            </div>
        </div>
    </div>
</div>

                <!-- Faculty of Education -->
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="card h-100">
                        <img src="assets/images/faculty-education.jpg" class="card-img-top" alt="Education Faculty">
                        <div class="card-body">
                            <h5 class="card-title">Faculty of Education</h5>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#educationPrograms">View Programs</button>
                            <div class="collapse mt-3" id="educationPrograms">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">BEd Accounting</li>
                                    <li class="list-group-item">BEd English</li>
                                    <li class="list-group-item">BEd Computer Science</li>
                                    <li class="list-group-item">BEd Geography</li>
                                    <li class="list-group-item">BEd Mathematics</li>
                                    <li class="list-group-item">BEd Religious Studies</li>
                                    <li class="list-group-item">Diploma in Basic Education</li>
                                    <li class="list-group-item">Postgraduate Diploma in Education</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- REVIEW -->
    @if($testimonials->count())
    <!-- REVIEW -->
    <section id="reviews" class="section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Testimonials</h1>
                        <div class="line"></div>
                        <p>We love to craft digital experiences for our applicants and students alike.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-5 gx-4">
                @foreach($testimonials as $testimonial)
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="{{ 150 + ($loop->index * 100) }}">
                    <div class="review">
                        <div class="review-head p-4 bg-white theme-shadow">
                            <div class="text-warning">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="ri-star-fill"></i>
                                    @endfor
                            </div>
                            <p>{{ $testimonial->message }}</p>
                        </div>
                        <div class="review-person mt-4 d-flex align-items-center">
                            <img class="rounded-circle" src="{{ asset('storage/' . $testimonial->image_path) }}" alt="" style="width: 50px; height: 50px;">
                            <div class="ms-3">
                                <h5>{{ $testimonial->name }}</h5>
                                <small>{{ $testimonial->position }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    <!-- TEAM -->
    <section id="team" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Leadership</h1>
                        <div class="line"></div>
                        <p>Meet the core team managing admissions through Priority Solutions Agency (PSA), the officially recognized admissions partner of Catholic University of Ghana.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="{{ asset('assets/images/emmanuel.jpg') }}" alt="Gyabaa Yeboah Emmanuel" style="max-width: 100%; border-radius: 10px;">
                        </div>
                        <div class="team-member-content">
                            <h4 class="text-white">Gyabaa Yeboah Emmanuel (Mr. Emma, Geky)</h4>
                            <p class="mb-0 text-white">CEO, Priority Solutions Agency<br>BSc. Computer Science (CUG, 2024)<br>MSc. Data Science (In Progress)</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="{{ asset('assets/images/samuel.jpg') }}" alt="Mr. Samuel Gyedu" style="max-width: 100%; border-radius: 10px;">
                        </div>
                        <div class="team-member-content">
                            <h4 class="text-white">Mr. Samuel Gyedu</h4>
                            <p class="mb-0 text-white">Director of Admissions, Priority Solutions Agency<br>BEd. Computer Science (CUG, 2024)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="section-padding bg-light" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 text-dark fw-semibold">Get in Touch</h1>
                        <div class="line bg-dark"></div>
                        <p class="text-dark">
                            Have questions or need support with your application? Contact the official Catholic University of Ghana Priority Admissions Office managed by PSA.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-aos="fade-down" data-aos-delay="250">
                <div class="col-lg-8">
                    @if(session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="row g-3 p-lg-5 p-4 bg-white theme-shadow">
                        @csrf

                        @if(session('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group col-lg-6">
                            <input type="text" name="first_name" class="form-control" placeholder="Enter first name" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" name="last_name" class="form-control" placeholder="Enter last name" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" name="email" class="form-control" placeholder="Enter Email address" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="message" rows="5" class="form-control" placeholder="Enter Message" required></textarea>
                        </div>
                        <div class="form-group col-lg-12 d-grid">
                            <button class="btn btn-brand">Send Message</button>
                        </div>
                    </form>

                    <div class="contact-info mt-5 text-center p-4 bg-light rounded shadow-lg">
                        <h4 class="text-primary mb-3 fw-bold">Contact Priority Admissions Office</h4>
                        <p class="mb-2 fs-5">
                            <i class="ri-mail-line text-danger me-2"></i>
                            <strong>Email:</strong> <a href="mailto:cug.admission@prioritysolutionsagency.com" class="text-decoration-none text-dark">cug.admission@prioritysolutionsagency.com</a>
                        </p>
                        <p class="mb-2 fs-5">
                            <i class="ri-phone-line text-success me-2"></i>
                            <strong>Phone:</strong> <a href="tel:+233248229540" class="text-decoration-none text-dark">+233 24 822 9540</a>
                        </p>
                        <p class="mb-2 fs-5">
                            <i class="ri-whatsapp-line text-success me-2"></i>
                            <strong>WhatsApp:</strong>
                            <a href="https://wa.me/233248229540" target="_blank" class="text-decoration-none text-dark">Chat with us on WhatsApp</a>
                        </p>
                        <p class="fs-5">
                            <i class="ri-map-pin-line text-primary me-2"></i>
                            <strong>Location:</strong> Fiapre-Sunyani, Bono Region, Ghana
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- BLOG -->
    <section id="blog" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Recent News & Articles</h1>
                        <div class="line"></div>
                        <p>Get the latest updates and insights from Catholic University of Ghana and our Admissions Office.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                        </div>
                        <h5 class="mt-4">{{ $post->title }}</h5>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('frontend.post.show', $post->slug) }}">Read More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-5">
        <div class="footer-top pb-4">
            <div class="container">
                <div class="row gy-5">

                    <!-- Logo and About -->
                    <div class="col-lg-4 col-sm-6">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('asserts/images/school-logo.png') }}" alt="CUG Logo" style="max-width: 100px;">
                        </a>
                        <div class="line my-3"></div>
                        <p>
                            This portal is managed by the <strong>Priority Admissions Office</strong><br>
                            — a trusted official partner of the Catholic University of Ghana, operated by <strong>Priority Solutions Agency (PSA)</strong>.
                        </p>
                        <div class="social-icons mt-3">
                            <a href="#" class="me-2"><i class="ri-facebook-fill"></i></a>
                            <a href="#" class="me-2"><i class="ri-instagram-fill"></i></a>
                            <a href="#"><i class="ri-twitter-fill"></i></a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-sm-6">
                        <h5 class="text-white">Quick Links</h5>
                        <div class="line mb-3"></div>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white-50 text-decoration-none">Home</a></li>
                            <li><a href="#about" class="text-white-50 text-decoration-none">About</a></li>
                            <li><a href="#services" class="text-white-50 text-decoration-none">Services</a></li>
                            <li><a href="#contact" class="text-white-50 text-decoration-none">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Admissions Info -->
                    <div class="col-lg-3 col-sm-6">
                        <h5 class="text-white">Admissions</h5>
                        <div class="line mb-3"></div>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white-50 text-decoration-none">Apply Now</a></li>
                            <li><a href="#" class="text-white-50 text-decoration-none">Requirements</a></li>
                            <li><a href="#" class="text-white-50 text-decoration-none">FAQs</a></li>
                            <li><a href="#" class="text-white-50 text-decoration-none">Programmes</a></li>
                        </ul>
                    </div>

                    <!-- Contact Details -->
                    <div class="col-lg-3 col-sm-6">
                        <h5 class="text-white">Contact Us</h5>
                        <div class="line mb-3"></div>
                        <ul class="list-unstyled text-white-50">
                            <li>📍 Catholic University of Ghana Campus, Sunyani</li>
                            <li>📞 024 822 9540</li>
                            <li>✉️ <a href="mailto:cug.admission@prioritysolutionsagency.com" class="text-white-50">cug.admission@prioritysolutionsagency.com</a></li>
                            <li><a href="{{ url('/') }}" class="text-white-50">{{ request()->getHost() }}</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom py-3 bg-black">
            <div class="container d-flex justify-content-between flex-wrap text-white-50 small">
                <span>© {{ now()->year }} Catholic University of Ghana - PSA Admissions Office</span>
                <span>Designed with ❤️ by <a href="https://gekychat.com" class="text-white-50 text-decoration-underline">Geky Media</a></span>
            </div>
        </div>
    </footer>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ asset('asserts/js/main.js') }}"></script>



</body>

</html>