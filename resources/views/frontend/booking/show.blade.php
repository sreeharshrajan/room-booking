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
                            <h1 class="text-white">Booking
                                @if (!is_null($booking->number))
                                    <span> #{{ $booking->number }}</span>
                                @endif
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="card shadow-xl mx-3 mx-md-4 mt-n6 ">
            <div class="card-body p-4">
                <dl class="row">
                    @if (!is_null($booking->number))
                        <div class="col-6">
                            <dt>Booking ID</dt>
                            <dd>{{ $booking->number }}</dd>
                        </div>
                    @endif
                    <div class="col-6">
                        <dt>Booked On</dt>
                        <dd>{{ $booking->created_at }}</dd>
                    </div>
                    <div class="col-6">
                        <dt class="">Guest Name</dt>
                        <dd class="">{{ $booking->booking_user }}</dd>
                    </div>
                    <div class="col-6">
                        <dt class="">Room Number</dt>
                        <dd class="">{{ $booking->room_no }}</dd>
                    </div>
                    <div class="col-6">
                        <dt class="">Check-In Date</dt>
                        <dd class="">{{ DateHelper::format($booking->start_date) }}</dd>
                    </div>
                    <div class="col-6">
                        <dt class="">Check-Out Date</dt>
                        <dd class="">{{ DateHelper::format($booking->end_date) }}</dd>
                    </div>
                    <div class="col-6">
                        <dt class="">Remarks</dt>
                        <dd class="">{{ $booking->remarks }}</dd>
                    </div>
                    <div class="col-6">
                        <dt class="">Status</dt>
                        <dd class="">{{ BookingConstants::STATUS[$booking->status] }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
