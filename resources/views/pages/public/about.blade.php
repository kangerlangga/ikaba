<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.public.head')
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
                <h2 class="text-white">{{ $judul }}</h2>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{  url('') }}/assets/logo/logo.jpeg" alt="Image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-header">
                        <p>About Us</p>
                        <h2>Ikaba Rambak</h2>
                    </div>
                    <div class="about-text">
                        <p style="text-align: justify">Selamat datang di UD Ikaba Rambak, sebuah perusahaan yang berlokasi di Mojokerto dan berdedikasi dalam menghasilkan kerupuk rambak tradisional berkualitas tinggi. Berawal dari kecintaan kami terhadap kuliner nusantara, Ikaba Rambak berkomitmen menghadirkan cita rasa asli melalui produk rambak yang renyah dan gurih. Dengan menggunakan bahan baku terbaik dan diproses secara higienis, kami menjaga kualitas dan keaslian rasa pada setiap potongan rambak yang dihasilkan. Kami percaya bahwa setiap gigitan rambak kami mampu membawa Anda merasakan kekayaan cita rasa Indonesia.
                        </p>
                        <p style="text-align: justify">Di Ikaba Rambak, kami tidak hanya fokus pada kualitas produk, tetapi juga menjunjung tinggi tradisi dan kearifan lokal dalam setiap tahap produksi. Proses pembuatan rambak kami dilakukan secara teliti dan penuh ketelitian, mulai dari pemilihan bahan hingga proses penggorengan yang menghasilkan tekstur sempurna. Hal ini kami lakukan agar setiap produk yang sampai ke tangan konsumen menjadi pengalaman kuliner yang memuaskan, baik sebagai camilan sehari-hari maupun pelengkap hidangan khas Indonesia.
                        </p>
                        <p style="text-align: justify">Kami terus berinovasi untuk memastikan produk rambak kami tetap relevan dan dapat dinikmati oleh berbagai kalangan. Dengan kepercayaan yang telah diberikan oleh konsumen selama bertahun-tahun, UD Ikaba Rambak Mojokerto berkomitmen untuk terus mempertahankan standar kualitas tinggi yang sudah dikenal. Kami berharap dapat terus menemani momen istimewa Anda dengan sajian rambak yang autentik dan penuh kenikmatan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@include('layouts.public.footer')
@include('layouts.public.script')
@endsection

<body>
    @yield('content')
</body>
</html>
