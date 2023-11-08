@extends('layouts.admin')
@section('content')
    <div class="row pt-4 align-items-center">
        <div class="col-md-6">
            <div class="info">
                <div class="d-flex gap-4 align-items-center">
                    <div class="mr-3 bg-gradient-primary p-4 rounded">
                        <i class="fa fa-calendar-o fa-2x text-light" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Total Bookings</h5>
                        <h2 class="card-subtitle mb-2 text-primary">{{ $totalBookings }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <div class="d-flex gap-4 align-items-center">
                    <div class="mr-3 bg-gradient-primary p-4 rounded">
                        <i class="fa fa-building-o fa-2x text-light" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Total Rooms</h5>
                        <h2 class="card-subtitle mb-2 text-primary">{{ $totalRooms }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-md-6">
            <div class="info">
                <div class="d-flex gap-4 align-items-center">
                    <div class="mr-3 bg-gradient-primary p-4 rounded">
                        <i class="fa fa-user-o fa-2x text-light" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Registered Users</h5>
                        <h2 class="card-subtitle mb-2 text-primary">{{ $totalUsers }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <div class="d-flex gap-4 align-items-center">
                    <div class="mr-3 bg-gradient-primary p-4 rounded">
                        <i class="fa fa-building fa-2x text-light" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Available Rooms</h5>
                        <h2 class="card-subtitle mb-2 text-primary">{{ $availableRooms }}</h2>
                    </div>
                </div>
                {{-- <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        <h2>{{ $totalBookings }}</h2>
                        <p>Available Rooms</p> --}}
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
