<!-- Nav Bar Start -->
<div class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
        <a href="{{ route('home.publik') }}" class="navbar-brand">
            <img src="{{  url('') }}/assets/logo/logo.png" alt="Ikaba Rambak Logo"> IKABA RAMBAK
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="{{ route('home.publik') }}" class="nav-item nav-link {{ Request::routeIs('home.publik') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about.publik') }}" class="nav-item nav-link {{ Request::routeIs('about.publik') ? 'active' : '' }}">About</a>
                <a href="{{ route('product.publik') }}" class="nav-item nav-link {{ Request::routeIs('product.publik') ? 'active' : '' }}">Product</a>
                <a href="{{ route('contact.publik') }}" class="nav-item nav-link {{ Request::routeIs('contact.publik') ? 'active' : '' }}">Contact</a>
                <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#checkOrder">Check Order</a>
            </div>
        </div>
    </div>
</div>
<!-- Nav Bar End -->

<!-- Modal -->
<div class="modal fade" id="checkOrder" tabindex="-1" aria-labelledby="checkOrderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkOrderLabel">Check Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Input untuk Nomor Pesanan -->
                <div class="form-group">
                    <input type="text" id="orderID" name="orderID" class="form-control" placeholder="Enter your Order Number">
                </div>
                <!-- Tombol untuk Check Order dan Check Payment -->
                <div class="buttonSet d-flex flex-column flex-md-row">
                    <a href="#" id="checkOrderBtn" class="btn btn-warning text-white w-100 mb-2 mb-md-0 mx-md-1">Check Order</a>
                    <a href="#" id="checkPaymentBtn" class="btn btn-warning text-white w-100 mx-md-1">Check Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>
