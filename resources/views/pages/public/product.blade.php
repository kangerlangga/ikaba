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
<?php if ($cP > 0) : ?>
<!-- Product Start -->
<div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <h2>Our Product</h2>
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
                            <a class="btn custom-btn" href="{{ route('product.buy', $P->code_products) }}">Buy Now</a>
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
@include('layouts.public.footer')
@include('layouts.public.script')
@endsection

<body>
    @yield('content')
</body>
</html>
