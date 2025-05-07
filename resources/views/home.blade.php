<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Apply Now - Catholic University of Ghana Admission Portal | CUG Fiapre</title>
  <meta name="description" content="Catholic University of Ghana (CUG) Admissions Portal. Apply online for undergraduate and postgraduate programmes at Fiapre-Sunyani. Join our academic community.">

  <link rel="canonical" href="https://admissions.cug.edu.gh/" />
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  <!-- Open Graph for social media -->
  <meta property="og:title" content="CUG Admission Portal - Apply Now" />
  <meta property="og:description" content="Apply online to Catholic University of Ghana for undergraduate and postgraduate studies." />
  <meta property="og:image" content="{{ asset('logo.png') }}" />
  <meta property="og:url" content="https://admissions.cug.edu.gh/" />
  <meta name="twitter:card" content="summary_large_image" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "CollegeOrUniversity",
    "name": "Catholic University of Ghana",
    "url": "https://cug.edu.gh",
    "logo": "https://cug.edu.gh/logo.png",
    "sameAs": [
      "https://www.facebook.com/CUGFiapre",
      "https://twitter.com/CUG_Fiapre"
    ],
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Fiapre",
      "addressRegion": "Bono Region",
      "addressCountry": "GH",
      "postalCode": "00233"
    }
  }
  </script>

  <!-- Google Fonts & CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('Styles.css') }}">
</head>


<body>

    <header class="header_part bg-#0c1e2e">
        <img src="{{ asset('logo.png') }}" alt="" class="img-fluid">
        <h4>{{ auth()->user()->name }}'s CUG ADMISSIONS</h4>
    </header>
  
    <div class="container">
        <div class="col-md-auto">
            <div class="row mb-12"></div>
            <div class="row bg-dark text-white px-3 py-3">
                CATHOLIC UNIVERSITY OF GHANA,FIAPRE-SUNYANI.
            </div>
            <h3>ADMISSION FORMS</h3>
            <div>
                <h5>
                    <h5>Applicant should indicate by ticking the preffered as specified here.</h5>
                </h5>
            </div>
            <div class="row mb-3"></div>
            <div class="row mb-5"></div>
            <div class="row bg-dark text-white px-3 py-3">
                A. Biodata(Application details)
            </div>
            <div>
                <h5>
                    Applicant's name must correspond to those used for all examinations taken
                </h5>
            </div>
        </div>
    </div>
    <script src={{ asset("assetss/js/customs.js") }}></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

</body>

</html>
