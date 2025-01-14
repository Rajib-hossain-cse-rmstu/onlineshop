<header class="header_area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-6">
                    <div class="welcome-note">
                        <span>
                            @foreach($settings as $setting)
                            <i class="icofont-email"></i>
                            {{$setting->email}}
                            @endforeach
                        </span>
                        <span class="mx-5">
                            @foreach($settings as $setting)
                            <i class="icofont-phone"></i>
                            {{$setting->phone}}
                            @endforeach
                            <span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="language-currency-dropdown d-flex align-items-center justify-content-end">
                        <!-- Language Dropdown -->
                        <div class="language-dropdown">
                            <div class="dropdown">
                                <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    English
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Bangla</a>
                                    <a class="dropdown-item" href="#">Arabic</a>
                                </div>
                            </div>
                        </div>

                        <!-- Currency Dropdown -->
                        <div class="currency-dropdown">
                            <div class="dropdown">
                                <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    $ USD
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" href="#">৳ BDT</a>
                                    <a class="dropdown-item" href="#">€ Euro</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="bigshop-main-menu">
        <div class="container">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar" id="bigshopNav">

                    <!-- Nav Brand -->
                    <a href="index.html" class="nav-brand">
                        @foreach($settings as $setting)
                        <img style="width: 140px; height:35px;" src="{{'/uploads/settings/' . $setting->logo}}"
                            alt="{{asset('frontend/img/core-img/logo.png')}}">
                        @endforeach
                    </a>


                    <!-- Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Close -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav -->
                        <div class="classynav">
                            <ul>
                                <li>
                                    <a href="{{route('frontend.dashboard')}}">Home</a>
                                </li>

                                <li>
                                    <a href="{{route('frontend.grid.product')}}">All Product</a>
                                </li>

                                <li><a href="#">Item</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-3">
                                            <li><strong>Category</strong></li>
                                            @foreach($categories as $category)
                                            <li><a href="{{route('frontend.category.grid', $category->id)}}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <ul class="single-mega cn-col-3">
                                            <li><strong>Brand</strong></li>
                                            @foreach($brands as $brand)
                                            <li><a href="{{route('frontend.brand.grid', $brand->id)}}">{{$brand->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <div class="single-mega cn-col-3">
                                        <strong>Banner</strong>
                                            <div class="megamenu-slides owl-carousel">
                                                 @foreach($banners as $banner)
                                                <a href="#">
                                                    <div>
                                                        <img style="width:200px;height:150px"
                                                        src="{{asset('/uploads/banner/'.$banner->photo)}}"
                                                        alt="{{$banner->photo}}">
                                                    </div>
                                                </a>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <a href="{{route('frontend.blog')}}">Blog</a>
                                </li>

                                <li>
                                    <a href="{{route('frontend.about_us')}}">About Us</a>
                                </li>

                                <li>
                                    <a href="{{route('frontend.contact_us')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Hero Meta -->
                    <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                        <!-- Search -->
                        <div class="search-area">
                            <div class="search-btn"><i class="icofont-search"></i></div>
                            <!-- Form -->
                            <div class="search-form">
                                <form action="{{route('frontend.search.product')}}" method="get">
                                    <input type="search" class="form-control" placeholder="Search anything" value="{{$search}}" name="search">
                                    <!-- <input type="submit" class="d-none" value="Send"> -->
                                    <button type="submit" class="btn btn-primary sm-btn">Search</button>
                                    <a href="{{route('frontend.dashboard')}}">
                                        <button type="reset" class="btn btn-primary sm-btn">Reset</button>
                                    </a>
                                </form>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="cart-area">
                            <div class="cart--btn">
                                <a href="{{route('frontend.wishlist')}}">
                                    <i class="icofont-heart"></i><span class="cart_quantity">
                                {{session()->has('wishlist') ? count(session()->get('wishlist')) : 0}}
                                <!-- class="wishlist-btn"  -->
                                    </span>
                                </a>
                            </div>

                        </div>

                        <!-- Cart -->
                        <div class="cart-area">
                            <div class="cart--btn">
                                <a href="{{route('product.cart.view')}}">
                                    <i class="icofont-cart"></i> <span class="cart_quantity">
                                        {{session()->has('cart') ? count(session()->get('cart')) : 0}}
                                    </span>
                                </a>
                            </div>

                            <!-- Cart Dropdown Content -->
                            <div class="cart-dropdown-content">
                                <ul class="cart-list">
                                @if(session()->has('cart'))
                                    @foreach(session('cart') as $id => $details)
                                       
                                    <li>
                                        <div class="cart-item-desc">
                                            <a href="#" class="image">
                                                <img src="{{url('/uploads/product_images/', $details['product_image'])}}"
                                                    class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a href="#">{{$details['product_name']}}</a>
                                                <p>{{$details['product_qty']}} x - <span class="price">BDT. {{number_format($details['product_price'], 2)}} &#2547;</span></p>
                                            </div>
                                        </div>
                                        <a href="{{route('delete.cart.item', $id)}}">
                                            <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                        </a>                                       
                                    </li>
                                    @endforeach

                                    @else
                                        <span>No Cart Product Available</span>
                                    @endif
                                </ul>
                                <div class="cart-pricing my-4">
                                    <ul>
                                        <li>
                                            <span>Sub Total:</span>
                                            @php
                                                if(session('cart'))
                                                    $total = array_sum(array_column(session()->get('cart'),'subtotal'));
                                                else
                                                    $total = 0;
                                            @endphp
                                            <span>BDT. {{number_format($total, 2)}} &#2547;</span>
                                        </li>
                                        <li>
                                            <span>VAT:</span>
                                            <span>
                                            @if(session('cart'))
                                            @php
                                                $total_vat = array_sum(array_column(session()->get('cart'),'subtotal'));
                                                $total_vat = (($total_vat * 10) / 100);
                                            @endphp
                                                BDT. {{$total_vat}} &#2547;
                                            @else
                                            @php
                                        $total_vat = 0;
                                        @endphp
                                        BDT. {{$total_vat}} &#2547;
                                        @endif
                                            </span>
                                        </li>
                                        <li>
                                            <span>Total:</span>
                                            <span>
                                            @if(session('cart'))
                                                BDT. {{$total + $total_vat}} &#2547;
                                                @php
                                                    session()->get('cart_total');
                                                    $cart_total = $total + $total_vat;
                                                    session()->put('cart_total', $cart_total);                                        
                                                @endphp
                                      
                                            @else
                                                BDT. 0 &#2547;
                                            @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-box">
                                    <a href="{{route('forntend.checkout')}}" class="btn btn-primary d-block">Checkout</a>
                                </div>
                            </div>
                        </div>

                        <!-- Account -->
                        <div class="account-area">
                            @if(auth()->check())
                            <div class="user-thumbnail">
                                    <div class="user-thumbnail m-r-2">
                                        <img src=""
                                            alt="">
                                    </div>
                                <ul class="user-meta-dropdown">
                                    <li class="user-title"><span>Hello,</span>
                                        @if(auth()->check())
                                            {{auth()->user()->firstname}} {{auth()->user()->lastname}}
                                        @endif
                                    </li>
                                    <li><a href="{{route('frontend.customer.dashboard')}}">My Account</a></li>
                                    <li><a href="{{route('frontend.customer.orderlist')}}">Orders List</a></li>
                                    <li>
                                        @if(auth()->check())
                                            <a href="{{route('customer.logout')}}"><i class="icofont-logout"></i>Logout</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                        <!-- Account -->
                        @guest
                            <a class="btn-sm btn-primary mx-2" role="button" data-bs-toggle="modal"
                            href="#exampleModalToggle" role="button">Login</a>

                            <a class="btn-sm btn-primary" role="button" data-bs-toggle="modal"
                            href="#exampleModalToggle22" role="button">Registration</a>
                        @endguest

                        @if(auth()->check())
                            <div class="mx-2">
                                <a class="" href="{{route('customer.logout')}}"><i class="icofont-user"></i>Logout | {{auth()->user()->firstname}} {{auth()->user()->lastname}}
                                </a>
                            </div>
                         @endif
                </nav>
            </div>
        </div>
    </div>
</header>


<!-- Login Modal Start -->

<!-- Customer Login Modal Start -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-title">Customer Login</h3>


                <div class="modal-body">

                    @if(count($errors) > 0 )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form class="m-3" action="{{route('customer.login')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <button type="reset" class="btn btn-primary close">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <a href="{{route('frontend.customer.email.check')}}">Reset Password Link</a>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Vendor
                    Login</button>
            </div>
        </div>
    </div>
</div>
<!-- Customer Login Modal End -->

<!-- Vendor Login Modal Start -->
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-title">Vendor Login</h3>

                @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="m-3" action="{{route('vendor.login')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>
                    <button type="reset" class="btn btn-primary close">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Customer
                    Login</button>
            </div>
        </div>
    </div>
</div>
<!-- Vendor Login Modal End -->

<!-- Login Modal End -->


<!-- Registration Modal Start -->

<!-- Customer Registration Modal Start -->
<div class="modal fade" id="exampleModalToggle22" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-title">Customer Registration</h3>

                <div class="modal-body">

                    @if(count($errors) > 0 )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form class="m-3" action="{{route('customer.registration')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name :<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="Enter First Name">
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name :<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                placeholder="Enter Last Name">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">User Name :<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter User Name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email :<span class="text-danger"> *</span></label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email Address">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password :<span class="text-danger">
                                    *</span></label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo :<span class="text-danger"> *</span></label>
                            <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone :<span class="text-danger"> *</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address :<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>

                        <!-- <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="input-group mb-3">
                                        <label for="status" class="form-label">Customer Status :<span class="text-danger">
                                                *</span></label>
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="status">Options</label>
                                        </div>
                                        <select name='status' class="custom-select" id="status">
                                            <option selected>Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->

                        <button type="reset" class="btn btn-primary close">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle33" data-bs-toggle="modal">Vendor
                    Registration</button>
            </div>
        </div>
    </div>
</div>
<!-- Customer Registration Modal End -->

<!-- Vendor Registration Modal Start -->
<div class="modal fade" id="exampleModalToggle33" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-title">Vendor Registration</h3>

                @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="m-3" action="{{route('vendor.registration')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name :<span class="text-danger">
                                *</span></label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            placeholder="Enter First Name">
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                            placeholder="Enter Last Name">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">User Name :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter User Name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email :<span class="text-danger"> *</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Email Address">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password :<span class="text-danger"> *</span></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter Password">
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo :<span class="text-danger"> *</span></label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone :<span class="text-danger"> *</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>

                    <div class="mb-3">
                        <label for="summernote1" class="form-label">Description :<span class="text-danger">
                                *</span></label>
                        <input type="text" class="form-control" id="summernote1" name="vendor_description"
                            placeholder="Description">
                    </div>

                    <div class="mb-3">
                        <label for="zip" class="form-label">Zip Number :<span class="text-danger"> *</span></label>
                        <input type="number" class="form-control" id="zip" name="zip_code"
                            placeholder="Enter Zip Number">
                    </div>

                    <!-- <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <div class="input-group mb-3">
                                    <label for="status" class="form-label">Vendor Status :<span
                                            class="text-danger"> *</span></label>
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="status">Options</label>
                                    </div>
                                    <select name='status' class="custom-select" id="status">
                                        <option selected>Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->

                    <button type="reset" class="btn btn-primary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle22" data-bs-toggle="modal">Customer
                    Registration</button>
            </div>
        </div>
    </div>
</div>
<!-- Vendor Registration Modal End -->

<!-- Registration Modal End -->
