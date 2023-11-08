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
                            <h1 class="text-white">My Bookings</h1>
                            @if (auth()->guard('user')->check())
                                <a href={{ route('user.booking.create') }} class="btn bg-white text-dark mt-4">Book Now</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
            <div class="table-responsive">
                <table class="table align-items-center mb-0 text-center">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">From Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">To Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. of
                                Guests</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Room Number
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (empty($bookings))
                            <tr>
                                <td class="text-sm font-weight-normal mb-0 text-center text-warning" colspan="5">No
                                    Bookings Found!!</td>
                            </tr>
                        @else
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td class="text-sm font-weight-normal mb-0">
                                        {{ DateHelper::format($booking->start_date) }}
                                    </td>
                                    <td class="text-sm font-weight-normal mb-0">
                                        {{ DateHelper::format($booking->end_date) }}
                                    </td>
                                    <td class="text-sm font-weight-normal mb-0 text-center">
                                        {{ $booking->no_of_guests }}</td>
                                    <td class="text-sm font-weight-normal mb-0">{{ $booking->room_no }}</td>
                                    <td class="text-sm font-weight-normal mb-0">{{ BookingConstants::STATUS[$booking->status] }}</td>
                                    <td class="justify-content-center d-flex">
                                        <a href="{{ route('user.booking.show', $booking->uuid) }}" class="btn btn-link text-secondary mb-0"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <form action="{{ route('user.booking.destroy', $booking->uuid) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-danger px-1 btn delete" title="delete">
                                                <span class="btn-inner--icon">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
