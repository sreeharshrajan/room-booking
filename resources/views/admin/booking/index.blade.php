@extends('layouts.admin')
@section('content')
    <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7 card">
        <div class="container border-bottom">
            <div class="row justify-space-between py-2">
                <div class="col-4 me-auto">
                    <p class="lead text-dark pt-1 mb-0">List of All Bookings</p>
                </div>
                <div class="col-3 text-end">
                    <a class="btn btn-icon btn-3 btn-primary btn-sm text-center gap-2"
                        href="{{ route('admin.booking.create') }}">
                        <i class="fa fa-plus"></i>
                        <span>Add New Booking</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0 text-center">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Room No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Start Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">End Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">No. of Guests</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (empty($bookings))
                            <tr>
                                <td class="text-sm font-weight-normal mb-0 text-center text-warning" colspan="5">No
                                    Bookings Found</td>
                            </tr>
                        @else
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td class="text-sm font-weight-normal mb-0">{{ $booking->booking_user }}</td>
                                    <td class="text-sm font-weight-normal mb-0">{{ $booking->room_no }}</td>
                                    <td class="text-sm font-weight-normal mb-0">
                                        {{ DateHelper::format($booking->start_date) }}
                                    </td>
                                    <td class="text-sm font-weight-normal mb-0">
                                        {{ DateHelper::format($booking->end_date) }}
                                    </td>
                                    <td class="text-sm font-weight-normal mb-0 text-center">{{ $booking->no_of_guests }}</td>
                                    <td class="justify-content-center d-flex">
                                        <a href="{{ route('admin.booking.show', $booking->uuid) }}" class="btn btn-link text-secondary mb-0"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <form action="{{ route('admin.booking.destroy', $booking->uuid) }}" method="POST">
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
