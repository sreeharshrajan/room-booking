@extends('layouts.admin')
@section('content')
    <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7 card">
        <div class="container border-bottom">
            <div class="row justify-space-between py-2">
                <div class="col-4 me-auto">
                    <p class="lead text-dark pt-1 mb-0">Edit Room Details</p>
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            @if ($errors->any())
                <p class="alert alert-danger text-white">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </p>
            @endif
            <form class="row" action="{{ route('admin.rooms.update', $room->uuid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="room_no">Room No</label>
                        <input type="text" class="form-control disabled @error('room_no') is-invalid @enderror"
                            name="room_no" value='{{ $room->room_no }}'>
                    </div>
                    @error('room_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="name">Room Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $room->name }}" />
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="description">Room Description</label>
                        <input class="form-control @error('description') is-invalid @enderror" name="description"
                            type="text" value="{{ $room->description }}" />
                    </div>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="rate">Room Rate</label>
                        <input type="number" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{ $room->rate }}"/>
                    </div>
                    @error('rate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
