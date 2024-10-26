<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{  url('') }}/assets/admin/img/user.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Str::limit(Auth::user()->name, 19) }}
                            <span class="user-level">{{ Str::limit(Auth::user()->jabatan, 19) }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('prof.edit') }}">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('prof.edit.pass') }}">
                                    <span class="link-collapse">Change Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="confirmLogout()">
                                    <span class="link-collapse">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-info">
                <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                    <a href="{{ route('admin.dash') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/order*') ? 'active' : '' }}">
                    <a href="{{ route('order.data') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Orders</p>
                        <?php if ($cOP > 0) : ?>
                        <span class="badge badge-danger">{{ $cOP }}</span>
                        <?php endif;?>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/home*') ? 'active' : '' }}">
                    <a href="{{ route('home.data') }}">
                        <i class="fas fa-images"></i>
                        <p>Home Sliders</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/message*') ? 'active' : '' }}">
                    <a href="{{ route('message.data') }}">
                        <i class="fas fa-envelope"></i>
                        <p>Customers</p>
                        <?php if ($cMC > 0) : ?>
                        <span class="badge badge-success">{{ $cMC }}</span>
                        <?php endif;?>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/product*') ? 'active' : '' }}">
                    <a href="{{ route('product.data') }}">
                        <i class="fas fa-shopping-bag"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/comment*') ? 'active' : '' }}">
                    <a href="{{ route('comment.data') }}">
                        <i class="fas fa-comments"></i>
                        <p>Comments</p>
                    </a>
                </li>
                @if (Auth::user()->level == 'Super Admin')
                <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}">
                    <a href="{{ route('user.data') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Users</p>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
