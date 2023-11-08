@extends('layouts.master')
@section('content')
    <div>
        <header class="bg-gradient-dark  py-2">
            <div class="page-header min-vh-50 "
                style="background-image: url('../assets/img/bg9.jpg'); transform: translate3d(0px, 2.5e-06px, 0px);">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center mx-auto my-auto">
                            <h1 class="text-white">Enjoy your holidays</h1>
                            <p class="lead mb-4 text-white opacity-8">Discover Comfort, Convenience, and Quality Stays at
                                BookNest</p>
                            @if (!auth()->guard('user')->check())
                                <a href={{ route('user.register') }} class="btn bg-white text-dark">Create Account</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6 p-lg-6">
            <div class="row text-center">
                <h2>Our Rooms</h2>
                <p class="lead">Choose the best from the best.</p>
            </div>
            <div class="row g-4">
                @foreach ($rooms as $room)
                    <div class="col-md-4">
                        <div class="card text-center shadow-lg">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover "
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/window-desk.jpg')">
                                <span class="mask bg-gradient-primary opacity-7"></span>
                                <div class="card-body position-relative z-index-1 d-flex flex-column mt-5">
                                    <h3 class="text-white font-weight-bolder">{{ $room->name }}</h3>
                                    <p class="text-white font-weight-light">{{ $room->description }}</p>
                                    <p class="text-white font-weight-light">₹ {{ $room->rate }} <small class="text-xs">/night</small> </p>
                                    <a class="text-white btn text-sm font-weight-bold mb-0 icon-move-right mt-4"
                                        href="{{ route('user.booking.create') }}">
                                        Book now &nbsp;
                                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
