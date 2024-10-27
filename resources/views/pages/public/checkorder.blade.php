<?php
function maskData($data, $showLast = false) {
    $data = (string) $data;
    $length = strlen($data);
    if ($showLast && $length > 5) {
        $firstThree = substr($data, 0, 3);
        $lastTwo = substr($data, -2);
        return $firstThree . str_repeat('*', $length - 5) . $lastTwo;
    }
    if ($length > 3) {
        $firstThree = substr($data, 0, 3);
        return $firstThree . str_repeat('*', $length - 3);
    }
    return $data;
}
$maskedName = maskData($DetailOrder->name_orders);
$maskedEmail = maskData($DetailOrder->email_orders, true);
$maskedPhone = maskData($DetailOrder->phone_orders, true);
$maskedAddress = maskData($DetailOrder->shipping_address);
$maskedQuantity = maskData($DetailOrder->qty_orders);
$maskedMethod = maskData($DetailOrder->payment_method);
$maskedNotes = maskData($DetailOrder->notes);
?>
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
  border: 6px solid #35A5B1;
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
.status-pending {
    color: #FF8C00;
    border-color: #FF8C00;
}
.status-processing {
    color: #007BFF;
    border-color: #007BFF;
}
.status-shipped {
    color: #6A5ACD;
    border-color: #6A5ACD;
}
.status-delivered {
    color: #228B22;
    border-color: #228B22;
}
.status-canceled {
    color: #DC143C;
    border-color: #DC143C;
}
#status_message {
    font-size: 17px;
    font-weight: 500;
    text-align: center;
    padding: 5px 9px;
    margin-bottom: 15px;
    border: 1px dashed;
}
.status-icon {
    margin-right: 5px;
    font-size: 20px;
    vertical-align: middle;
}
.status-pending .status-icon {
    color: #FF8C00;
}
.status-processing .status-icon {
    color: #007BFF;
}
.status-shipped .status-icon {
    color: #6A5ACD;
}
.status-delivered .status-icon {
    color: #228B22;
}
.status-canceled .status-icon {
    color: #DC143C;
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
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Order Number</h3>
                        <p>{{ $DetailOrder->order_number }}</p>
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
        <div class="row contact-form mb-5">
            <div class="col-12">
                <h4>Order Detail</h4>
                <div id="status_message" class="
                    @if($DetailOrder->status_orders == 'Pending') status-pending
                    @elseif($DetailOrder->status_orders == 'Processing') status-processing
                    @elseif($DetailOrder->status_orders == 'Shipped') status-shipped
                    @elseif($DetailOrder->status_orders == 'Delivered') status-delivered
                    @elseif($DetailOrder->status_orders == 'Canceled') status-canceled
                    @endif">
                    <span class="status-icon">
                        @if($DetailOrder->status_orders == 'Pending')
                            <i class="fas fa-clock"></i>
                        @elseif($DetailOrder->status_orders == 'Processing')
                            <i class="fas fa-box-open"></i>
                        @elseif($DetailOrder->status_orders == 'Shipped')
                            <i class="fas fa-shipping-fast"></i>
                        @elseif($DetailOrder->status_orders == 'Delivered')
                            <i class="fas fa-check-circle"></i>
                        @elseif($DetailOrder->status_orders == 'Canceled')
                            <i class="fas fa-times-circle"></i>
                        @endif
                    </span>
                    {{ $DetailOrder->status_orders }}
                </div>
                <form method="POST" action="{{ route('buy.submit') }}" enctype="multipart/form-data" id="order_form">
                    @csrf
                    <div class="control-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" value="{{ $maskedName }}" readonly/>
                        <p class="help-block text-danger">@error('Name') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" value="{{ $maskedEmail }}" readonly/>
                        <p class="help-block text-danger">@error('Email') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <label for="Phone">Phone</label>
                        <input type="tel" class="form-control" id="Phone" name="Phone" value="{{ $maskedPhone }}" readonly/>
                        <p class="help-block text-danger">@error('Phone') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" value="{{ $maskedAddress }}" readonly/>
                        <p class="help-block text-danger">@error('Address') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <label for="Quantity">Quantity</label>
                        <input type="number" class="form-control" id="Quantity" name="Quantity" value="{{ $maskedQuantity }}" readonly/>
                        <p class="help-block text-danger">@error('Quantity') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <label for="Method">Payment Method</label>
                        <input type="text" class="form-control" id="Method" name="Method" value="{{ $maskedMethod }}"/>
                        <p class="help-block text-danger">@error('Method') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <label for="Notes">Notes</label>
                        <input type="text" class="form-control" id="Notes" name="Notes" value="{{ $maskedNotes }}"/>
                        <p class="help-block text-danger">@error('Notes') {{ $message }} @enderror</p>
                    </div>
                    <div class="control-group">
                        <label for="Total">Total Payment</label>
                        <input name="Total" value="Rp {{ number_format($DetailOrder->total_orders, 0, ',', '.') }}" id="Total" class="form-control" readonly style="cursor: not-allowed"/>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <a href="{{ route('check.receipt', $DetailOrder->order_number) }}" class="btn custom-btn">Payment Status</a>
                        @if($DetailOrder->payment_status != 'Paid')
                        <a href="{{ route('edit.receipt', $DetailOrder->order_number) }}" class="btn custom-btn">Upload Receipt</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.public.footer')
@include('layouts.public.script')
@endsection

<body>
    @yield('content')
</body>
</html>
