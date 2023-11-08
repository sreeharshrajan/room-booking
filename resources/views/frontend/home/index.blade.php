@extends('layouts.master')

@section('content')
    <div>
        <section class="page-header min-vh-80"
            style="background-image: url(&#39;https://images.unsplash.com/photo-1520769945061-0a448c463865?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80&#39;);"
            loading="lazy">
            <span class="mask bg-gradient-dark opacity-5"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 d-flex justify-content-center flex-column">
                        <h1 class="text-white mb-4">Welcome to BookNest</h1>
                        <p class="text-white opacity-8 lead pe-5 me-5">Your Ultimate Destination for Hassle-Free Room
                            Bookings. Discover Comfort, Convenience, and Quality Stays at BookNest </p>
                        <div class="buttons">
                            {{-- <button type="button" class="btn btn-white mt-4">Book Now</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
            <section class="py-4">
                <div class="container">
                    <div class="row  align-items-center">
                        <div class="col-lg-3">
                            <h1>Find Your <br> Perfect Stay</h1>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group input-group-static my-3">
                                <label>From Date</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group input-group-static my-3">
                                <label>To Date</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3 px-4">
                            <button type="button" class="btn btn-primary btn-lg ">Search Rooms</button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-9">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 my-auto">
                            <h3>Read More About Us</h3>
                            <p class="pe-5">PAt BookNest, we believe that every traveler deserves a comfortable and hassle-free stay. Our mission is to provide a seamless booking experience, offering a wide range of meticulously curated rooms to suit every preference and budget.</p>
                            <a href="javascript:;" class="text-primary icon-move-right">More about us
                                <i class="fas fa-arrow-right text-sm ms-1"></i>
                            </a>
                        </div>
                        <div class="col-lg-6 mt-lg-0 mt-5 ps-lg-0 ps-0">
                            <div class="p-3 info-horizontal">
                                <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                                    <i class="fas fa-bed opacity-10"></i>
                                </div>
                                <div class="description ps-3">
                                    <p class="mb-0">From cozy retreats to luxurious suites, we offer a diverse range of rooms to suit every traveler's preferences and budget.</p>
                                </div>
                            </div>

                            <div class="p-3 info-horizontal">
                                <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                                    <i class="fas fa-dollar-sign opacity-10"></i>
                                </div>
                                <div class="description ps-3">
                                    <p class="mb-0">We believe in upfront pricing with no hidden fees. You'll always know exactly what you're paying for when you book with us.</p>
                                </div>
                            </div>
                            <div class="p-3 info-horizontal">
                                <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                                    <i class="fas fa-headset opacity-10"></i>
                                </div>
                                <div class="description ps-3">
                                    <p class="mb-0">Our dedicated support team is available 24/7 to assist you with any inquiries or issues, ensuring your stay is nothing short of perfect.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="my-5 pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <h4>Be the first to see the news</h4>
                            <p class="mb-4">
                                Sign up to receive exclusive updates, special offers, and the latest news from BookNest. Be
                                among the first to know about new room listings, promotions, and exciting developments!
                            </p>
                            <div class="row">
                                <div class="col-8">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Enter Email Here.</label>
                                        <input type="text" class="form-control ">
                                    </div>
                                </div>
                                <div class="col-4 ps-0">
                                    <button type="button"
                                        class="btn bg-gradient-primary mb-0 h-100 position-relative z-index-2">Subscribe</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 ms-auto">
                            <div class="position-relative">
                                <img class="max-width-50 w-100 position-relative z-index-2" src="../assets/img/macbook.png"
                                    alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
