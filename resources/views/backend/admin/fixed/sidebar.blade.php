<!-- use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request; -->
<nav class="pcoded-navbar menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">

                        <img class="img-radius" src="" class="img-radius"
                                alt="">
                        <div class="user-details">
                            <div id="more-details"><i class="fa fa-caret-down"></i>name</div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item"><a href="user-profile.html"><i
                                        class="feather icon-user m-r-5"></i>View Profile</a></li>
                            <li class="list-group-item"><a href="#!"><i
                                        class="feather icon-settings m-r-5"></i>Settings</a></li>
                            <li class="list-group-item"><a href="auth-normal-sign-in.html"><i
                                        class="feather icon-log-out m-r-5"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <!-- //product Section -->
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Product</span><span
                                class="badge badge-primary ml-3">@if($products->count() > 0){{$products->count()}}@endif</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('admin.product.list')}}">Product List</a></li>
                            <li><a href="{{route('admin.product.create')}}">Add Product</a></li>
                        </ul>
                    </li>
                    <!-- //Category Section -->
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Category</span><span
                                class="badge badge-primary ml-3">@if($categories->count() > 0){{$categories->count()}}@endif</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('admin.category.list')}}">Category List</a></li>
                            <li><a href="{{route('admin.category.create')}}">Add Category</a></li>
                        </ul>
                    </li>

                    <!--End Sub Category section -->
                    <!-- //brand section -->
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Brand</span><span
                                class="badge badge-primary ml-3">@if($brands->count() > 0){{$brands->count()}}@endif</span></a>
                     
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('admin.brand.list')}}">Brand List</a></li>
                            <li><a href="{{route('admin.brand.create')}}">Add Brand</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Banner</span><span
                                class="badge badge-primary ml-3">@if($banners->count() > 0){{$banners->count()}}@endif</span></a>
                     
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('admin.banner.list')}}">Banner List</a></li>
                            <li><a href="{{route('admin.banner.create')}}">Add Banner</a></li>
                        </ul>
                    </li>
    
                    <!--Customer and Vendor Start -->
                    <li class="nav-item pcoded-menu-caption">
                        <label>Customer &amp; Vendor</label>
                    </li>

                    <li class="nav-item pcoded-hasmenu">

                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Customer</span><span
                                class="badge badge-primary ml-3">@if($customers->count() > 0){{$customers->count()}}@endif</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('admin.customer.list')}}">Customer List</a></li>
                            <li><a href="{{route('admin.customer.create')}}">Customer Add</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Vendor</span><span
                                class="badge badge-primary ml-3">@if($vendors->count() > 0){{$vendors->count()}}@endif</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('admin.vendor.list')}}">Vendor List</a></li>
                            <li><a href="{{route('admin.vendor.create')}}">Vendor Add</a></li>
                        </ul>
                    </li>
                    
                <!-- Customer and Vendor end -->
                <!-- Setting Start -->
                <li class="nav-item pcoded-menu-caption">
                        <label>Setting</label>
                </li>
                <li class="nav-item">
                        <a href="{{route('admin.setting.details')}}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">Setting</span></a>
                </li>
                <!-- Setting End -->

                <!-- Order Start -->
                <li class="nav-item pcoded-menu-caption">
                        <label>Order</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Order</span><span
                                class="badge badge-primary ml-3">2</span></a>
                     
                        <ul class="pcoded-submenu">
                            <li><a href="">Order List</a></li>
                            <li><a href="">Order Approved</a></li>
                            <li><a href="">Order Rejected</a></li>
                            <li><a href="">Order Delivered</a></li>
                            <li><a href="">Order Recieved</a></li>
                        </ul>
                    </li>
                    <!-- Order End -->
             
                </ul>
            </div>
        </div>
    </nav>