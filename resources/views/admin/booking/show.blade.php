@extends('layouts.admin')
@section('content')
    <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7 card">
        <div class="container border-bottom">
            <div class="row justify-space-between py-2">
                <div class="col-4 me-auto">
                    <p class="lead text-dark pt-1 mb-0">Booking Details</p>
                </div>
            </div>
        </div>
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
@endsection
