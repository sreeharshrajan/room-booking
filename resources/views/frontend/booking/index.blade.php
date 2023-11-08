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
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. of
                                Guests</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Room Number
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($bookings))
                            <tr>
                                <td class="text-sm font-weight-normal mb-0 text-center text-warning" colspan="5">No
                                    Bookings Found!!</td>
                            </tr>
                        @else
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td class="text-sm font-weight-normal mb-0">{{ $booking->start_date }}</td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-xs">Spotify</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-normal mb-0">$2,500</p>
                            </td>
                            <td>
                                <span class="badge bg-gradient-secondary">
                                    Secondary
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <div class="d-flex align-items-center">
                                    <span class="me-2 text-xs">60%</span>
                                </div>
                            </td>

                            <td class="align-middle">
                                <button class="btn btn-link text-secondary mb-0">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
