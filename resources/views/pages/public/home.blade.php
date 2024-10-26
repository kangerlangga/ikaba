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
<?php if ($cHS > 0) : ?>
<!-- Carousel Start -->
<div class="carousel">
    <div class="container-fluid">
        <div class="owl-carousel">
            @foreach ($HomeSlider as $H)
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="{{ url('') }}/assets/public/img/HomeSlider/{{ $H->image_home_sliders }}" alt="Image">
                </div>
                <div class="carousel-text">
                    <h1>{{ $H->title_home_sliders }}</h1>
                    <p>{{ $H->desc_home_sliders }}</p>
                    <div class="carousel-btn">
                        <a class="btn custom-btn btn-vp" href="{{ route('product.publik') }}">View Product</a>
                        <a class="btn custom-btn" href="#" data-toggle="modal" data-target="#checkOrder">Check Order</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Carousel End -->
<?php endif;?>
<?php if ($cP > 0) : ?>
<!-- Product Start -->
<div class="blog" style="background: rgba(0, 0, 0, .04);">
    <div class="container">
        <div class="section-header text-center">
            <h2>New Product</h2>
            <p>Grab these new items before they are gone!</p>
        </div>
        <div class="row">
            @foreach ($Product as $P)
            <div class="col-md-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="{{  url('') }}/assets/public/img/Product/{{ $P->image_products }}" alt="Product">
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-title">{{ $P->code_products }} | {{ $P->name_products }}</h2>
                        <div class="blog-meta">
                            <p><i class="fas fa-money-bill-wave"></i>Rp {{ number_format($P->price_products, 0, ',', '.') }}</p>
                        </div>
                        <div class="blog-text">
                            <a class="btn custom-btn" href="{{ route('product.publik') }}">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Product End -->
<?php endif;?>
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
                        <a class="btn custom-btn" href="{{ route('about.publik') }}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<?php if ($cC > 0) : ?>
<!-- Testimonial Start -->
<div class="testimonial">
    <div class="container">
        <div class="section-header text-center">
            <h2>Testimonials</h2>
            <p>See what our customers are saying about our quality and service.</p>
        </div>
        <div class="owl-carousel testimonials-carousel">
            @foreach ($Comment as $C)
            <div class="testimonial-item">
                <div class="testimonial-img">
                    <img src="{{  url('') }}/assets/public/img/cat1.jpg" alt="Image">
                </div>
                <p>"{{ $C->content_comments }}"</p>
                <h2>{{ $C->author_comments }}</h2>
                <h3>{{ $C->job_comments }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->
<?php endif;?>
@include('layouts.public.footer')
@include('layouts.public.script')
@endsection

<body>
    @yield('content')
</body>
</html>
