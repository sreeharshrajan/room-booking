@extends('layouts.admin')
@section('content')
    <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7 card">
        <div class="container border-bottom">
            <div class="row justify-space-between py-2">
                <div class="col-4 me-auto">
                    <p class="lead text-dark pt-1 mb-0">Book a Room</p>
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            <form class="row" action="{{ route('admin.booking.store') }}" method="POST">
                @csrf
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="start_date">From Date</label>
                        <input type="start_date" class="form-control @error('start_date') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="end_date">To Date</label>
                        <input type="end_date" class="form-control @error('end_date') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="room_id">Room No</label>
                        <select class="form-control @error('room_id') is-invalid @enderror" id="room_id">
                            <option value="">Select a room</option>
                            @foreach ($rooms as $room)
                            <option value="{{ $room->uuid }}">{{ $room->room_no }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="guests">No. of Guests</label>
                        <input class="form-control @error('guests') is-invalid @enderror" id="guests" type="text" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="remarks">Remarks</label>
                        <input type="text" class="form-control @error('remarks') is-invalid @enderror" id="remarks">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
