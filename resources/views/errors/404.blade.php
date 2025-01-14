@extends('frontend.master')

@section('frontend_content')

<!-- Breadcumb Area -->
<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>404</h5>
                <ol class="breadcrumb">
                    @auth()
                    @if(auth()->user()->role == 'customer')
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    @elseif(auth()->user()->role == 'vendor')
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    @elseif(auth()->user()->role == 'admin')
                    <li class="breadcrumb-item"><a href="">DASHBOARD</a></li>
                    @endif
                    @endauth
                    @guest
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                    @endguest
                    <li class="breadcrumb-item active">404</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- Not Found Area -->
<section class="error_page text-center section_padding_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="not-found-text">
                    <h2>404</h2>
                    <h5 class="mb-3">Oops! Page Not Found</h5>
                    <p>Sorry! the page you looking for is not found. Make sure that you have typed the currect URL</p>
                    @auth()
                    @if(auth()->user()->role == 'customer')
                    <a href="{{route('frontend.dashboard')}}" class="btn btn-primary mt-3"><i class="icofont-home"></i> GO
                        HOME</a>
                    @elseif(auth()->user()->role == 'vendor')
                    <a href="{{route('frontend.dashboard')}}" class="btn btn-primary mt-3"><i class="icofont-home"></i> GO
                        HOME</a>
                    @elseif(auth()->user()->role == 'admin')
                    <a href="{{route('admin.dashboard')}}" class="btn btn-primary mt-3 mx-5"><i class="icofont-dashboard-web"></i> GO
                        TO DASHBOARD</a>

                    <a href="{{route('frontend.dashboard')}}" class="btn btn-primary mt-3"><i class="icofont-home"></i> GO
                        HOME</a>
                    @endif
                    @endauth
                    @guest
                            <a href="{{route('frontend.dashboard')}}" class="btn btn-primary mt-3"><i class="icofont-home"></i> GO
                        HOME</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Not Found Area End -->

@endsection

