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

<div class="contact">
    <div class="container">
        <div class="section-header text-center">
            <h2>{{ $DetailProduct->name_products }}</h2>
        </div>
        <div class="row">
            <div class="col-12 text-center mb-4">
                <img class="blur-up lazyload" src="{{ url('') }}/assets/public/img/Product/{{ $DetailProduct->image_products }}" alt="Buy Now" style="max-height: 45vh"/>
            </div>
        </div>
        <div class="row align-items-center contact-information">
            <div class="col-md-6 col-lg-4">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-box"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Stock Product</h3>
                        <p>{{ $DetailProduct->stock_products }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Price Product</h3>
                        <p>Rp {{ number_format($DetailProduct->price_products, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-barcode"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Code Product</h3>
                        <p>{{ $DetailProduct->code_products }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row contact-form">
            <div class="col-12">
                <h4>Order Form</h4>
                <p>Please fill out the order form below to complete your purchase. Ensure all details are accurate for a smooth transaction process.</p>
                <form method="POST" action="{{ route('buy.submit') }}" enctype="multipart/form-data" id="order_form">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Your Name" value="{{ old('Name') }}" required/>
                        <p class="help-block text-danger">@error('Name') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Your Email" value="{{ old('Email') }}" required/>
                        <p class="help-block text-danger">@error('Email') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <input type="tel" class="form-control" id="Phone" name="Phone" placeholder="Your Phone" value="{{ old('Phone') }}" required/>
                        <p class="help-block text-danger">@error('Phone') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="Address" name="Address" placeholder="Address" value="{{ old('Address') }}" required/>
                        <p class="help-block text-danger">@error('Address') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <input type="number" min="1" max="{{ $DetailProduct->stock_products }}" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" value="{{ old('Quantity') }}" required/>
                        <p class="help-block text-danger">@error('Quantity') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="Method" name="Method" placeholder="Payment Method" value="{{ old('Method') }}"/>
                        <p class="help-block text-danger">@error('Method') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="Notes" name="Notes" placeholder="Notes" value="{{ old('Notes') }}"/>
                        <p class="help-block text-danger">@error('Notes') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <label for="Total">Total Payment</label>
                        <input name="Total" value="" id="Total" placeholder="0" class="form-control" readonly style="cursor: not-allowed"/>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <input type="hidden" name="Product" value="{{ $DetailProduct->code_products }}">
                        <button class="btn custom-btn" type="submit" id="sendOrderButton">Order Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.public.footer')
@include('layouts.public.script')
<script>
    let productPrice = 0;
    document.getElementById('Quantity').addEventListener('input', function() {
        const productCode = '{{ $DetailProduct->code_products }}';
        if (productCode) {
            fetch(`/get-product-price/${productCode}`)
                .then(response => response.json())
                .then(data => {
                    productPrice = data.price;
                    updateTotal();
                });
        } else {
            productPrice = 0;
            updateTotal();
        }
        updateTotal();
    });

    function updateTotal() {
        const quantity = document.getElementById('Quantity').value;
        const total = productPrice * quantity;
        document.getElementById('Total').value = formatCurrency(total) || 0;
    }

    function formatCurrency(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function removeDotsFromTotal() {
        const totalInput = document.getElementById('Total');
        totalInput.value = totalInput.value.replace(/\./g, '');
    }

    document.getElementById('sendOrderButton').addEventListener('click', function(e) {
        e.preventDefault();
        var form = document.getElementById('order_form');
        if (form.checkValidity()) {
            Swal.fire({
                title: 'Confirmation',
                text: "Are you sure your order details are correct? Once submitted, your order cannot be changed.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#feb300',
                cancelButtonColor: '#AAA',
                confirmButtonText: 'Yes, Order!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    removeDotsFromTotal();
                    form.submit();
                }
            });
        } else {
            form.reportValidity();
        }
    });
</script>
@endsection

<body>
    @yield('content')
</body>
</html>
