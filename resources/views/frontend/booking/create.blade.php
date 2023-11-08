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
                            <h1 class="text-white">New Booking</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
            @if ($errors->any())
                <p class="alert alert-danger text-white">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </p>
            @endif
            <form class="row" action="{{ route('user.booking.store') }}" method="POST">
                @csrf
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="start_date">From Date</label>
                        <input type="date" name="start_date" min="<?= date('Y-m-d') ?>"
                            class="form-control @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date') }}" id="start_date" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="end_date">To Date</label>
                        <input type="date" name="end_date" min="<?= date('Y-m-d') ?>" class="form-control @error('end_date') is-invalid @enderror"
                            value="{{ old('end_date') }}" id="end_date" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="room_id">Room No</label>
                        <select class="form-control @error('room_id') is-invalid @enderror" id="room_id" name="room_id">
                            <option value="">Select a room</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->uuid }}">{{ $room->room_no }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="no_of_guests">No. of Guests</label>
                        <input class="form-control @error('no_of_guests') is-invalid @enderror" id="guests"
                            type="text" name="no_of_guests" value="{{ old('no_of_guests') }}"
                            onchange="calculateRooms()" />
                    </div>
                    <p id="roomsRequired" class="text-warning">

                    </p>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="remarks">Remarks</label>
                        <input type="text" class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                            name="remarks" value="{{ old('remarks') }}">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
<script type="text/javascript">

</script>
@endpush
