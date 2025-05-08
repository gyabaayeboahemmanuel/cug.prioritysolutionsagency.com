<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title', 'Catholic University of Ghana Priority Admissions Office')</title>
  <meta name="description" content="@yield('meta_description', 'Apply for admission to Catholic University of Ghana through the Priority Admissions Office. Fast, secure, and officially approved.')">
  <meta name="keywords" content="@yield('meta_keywords', 'Catholic University of Ghana, CUG admissions, apply CUG, Ghana university admission, Priority Admissions Office, PSA')">
  <meta name="author" content="Catholic University of Ghana - Priority Admissions Office">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-17064362298"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-17064362298');
</script>
  <!-- Canonical URL -->
  <link rel="canonical" href="{{ url()->current() }}" />

  <!-- Open Graph for social media -->
  <meta property="og:title" content="@yield('og_title', 'Apply to CUG with Priority Admissions Office')" />
  <meta property="og:description" content="@yield('og_description', 'Official admission portal operated under the Catholic University of Ghana Admissions Directorate.')" />
  <meta property="og:image" content="{{ asset('new/assets/img/og-image.jpg') }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:site_name" content="Catholic University of Ghana" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('twitter_title', 'Apply to Catholic University of Ghana')" />
  <meta name="twitter:description" content="@yield('twitter_description', 'Get admitted easily through the official Priority Admissions Office.')" />
  <meta name="twitter:image" content="{{ asset('new/assets/img/og-image.jpg') }}" />

  <!-- Favicons -->
  <link href="{{ asset('new/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('new/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Nunito&family=Poppins&display=swap" rel="stylesheet">

  <!-- CSS Libraries -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('new/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('new/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('new/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('new/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('new/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('new/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('new/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS -->
  <link href="{{ asset('new/assets/css/style.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Structured Data for SEO -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "CollegeOrUniversity",
    "name": "Catholic University of Ghana",
    "url": "https://cug.edu.gh",
    "logo": "https://cug.edu.gh/logo.png",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Fiapre",
      "addressRegion": "Bono Region",
      "addressCountry": "GH",
      "postalCode": "00233"
    },
    "department": {
      "@type": "CollegeOrUniversity",
      "name": "Priority Admissions Office",
      "description": "Operated under Priority Solutions Agency (PSA) - Official Admission Partner"
    }
  }
  </script>
</head>


<body>

  @include('base.header')
  @include('base.sidenav')

  <!-- content -->
  @yield('content')
  <!-- content end -->

  @include('base.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('new/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('new/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('new/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('new/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('new/assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('new/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('new/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('new/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('new/assets/js/main.js') }}"></script>

</body>
</html>
