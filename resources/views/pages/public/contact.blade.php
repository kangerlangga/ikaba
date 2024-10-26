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

<!-- Contact Start -->
<div class="contact">
    <div class="container">
        <div class="section-header text-center">
            <h2>Contact Us</h2>
            <p>Feel free to get in touch for any questions or support.</p>
        </div>
        <div class="row align-items-center contact-information">
            <div class="col-md-6 col-lg-4">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Address</h3>
                        <p>Jl. Raya Bangsal No.90, Mojokerto.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-comment-dots"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Chat Us</h3>
                        <p>+62 856-4544-2344</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Email Us</h3>
                        <p>sales@ud-ikaba.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row contact-form">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15822.794357856064!2d112.4859949!3d-7.4984906!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e780ce667566707%3A0x9aa18e8ca1bc0478!2sKrupuk%20Rambak%20Ikaba!5e0!3m2!1sid!2sid!4v1729922122956!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <div id="success"></div>
                <form method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Your Name" value="{{ old('Name') }}" required/>
                        <p class="help-block text-danger">@error('Name') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <input type="tel" class="form-control" id="Phone" name="Phone" placeholder="Your Phone" value="{{ old('Phone') }}" required/>
                        <p class="help-block text-danger">@error('Phone') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Your Email" value="{{ old('Email') }}" required/>
                        <p class="help-block text-danger">@error('Email') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="Subject" name="Subject" placeholder="Subject" value="{{ old('Subject') }}" required/>
                        <p class="help-block text-danger">@error('Subject') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" id="Message" name="Message" placeholder="Message" required>{{ old('Message') }}</textarea>
                        <p class="help-block text-danger">@error('Message') {{ $message }} @enderror</p>
                    </div>
                    <div>
                        <button class="btn custom-btn" type="submit" id="sendMessageButton">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@include('layouts.public.footer')
@include('layouts.public.script')
<script>
    @if(session('success'))
    Swal.fire({
        icon: "success",
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 3000
    });
    @elseif(session('error'))
    Swal.fire({
        icon: "error",
        title: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 3000
    });
    @endif
</script>
@endsection

<body>
    @yield('content')
</body>
</html>
