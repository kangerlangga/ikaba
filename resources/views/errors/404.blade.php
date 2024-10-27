<!DOCTYPE html>
<html lang="en">
<head>
            <!-- PRECONNECT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://unpkg.com">
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="dns-prefetch" href="https://www.w3.org">
    <link rel="preconnect" href="https://www.w3.org">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <!-- SIMPLE META -->
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="id-ID">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="google" content="notranslate">
    <meta name="googlebot" content="index,follow">
    <meta name="author" content="Ikaba">
    <meta name="language" content="id">
    <meta name="geo.country" content="id">
    <meta name="geo.placename" content="Indonesia">
    <meta name="robots" content="all,index,follow">
	<meta NAME="Distribution" CONTENT="Global">
	<meta NAME="Rating" CONTENT="General">

    <!-- WEBSITE META -->
    <title>Page Not Found | Ikaba Official Website</title>
    <meta name="keywords" content="Ikaba, Ikaba Rambak, Ikaba Official Website">
    <meta name="description" content="Ikaba Rambak Mojokerto adalah produsen rambak tradisional berkualitas tinggi dari Mojokerto yang menggunakan bahan baku pilihan dan proses produksi terjaga untuk menghasilkan rambak renyah dan gurih, cocok sebagai camilan atau pelengkap hidangan.">
    <link rel="icon" type="image/png" href="{{  url('') }}/assets/logo/logo.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{  url('') }}/assets/public/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{  url('') }}/assets/public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{  url('') }}/assets/public/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="{{  url('') }}/assets/public/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{  url('') }}/assets/public/css/style.css" rel="stylesheet">

    <!-- WAP -->
    <script type="text/javascript" src="{{  url('') }}/assets/public/wap/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="{{  url('') }}/assets/public/wap/floating-wpp.min.js"></script>
    <link rel="stylesheet" href="{{  url('') }}/assets/public/wap/floating-wpp.min.css">

    <!-- Source Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
@section('content')
<div id="preloader"></div>
<style>
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #fff;
}
#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #feb300;
  border-top-color: #e7e4fe;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: animate-preloader 1s linear infinite;
}
@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
@include('layouts.public.nav')
<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-white">404 Page Not Found</h2>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- 404 Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <img src="{{  url('') }}/assets/public/img/404.png" alt="404 Image" class="img-fluid mb-4">
                <h1 class="mb-4">Page Not Found</h1>
                <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                <a class="btn custom-btn py-3 px-5" href="{{ route('home.publik') }}">Go Back To Home</a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->
@include('layouts.public.footer')
@include('layouts.public.script')
@endsection

<body>
    @yield('content')
</body>
</html>
