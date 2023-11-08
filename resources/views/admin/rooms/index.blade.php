@extends('layouts.admin')
@section('content')
    @if (session()->has('success'))
        <div class="alert
        alert-success text-white" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7 mt-2 card">
        <div class="container border-bottom">
            <div class="row justify-space-between py-2">
                <div class="col-4 me-auto">
                    <p class="lead text-dark pt-1 mb-0">List of All Rooms</p>
                </div>
                <div class="col-2 text-end">
                    <a class="btn btn-icon btn-3 btn-primary btn-sm d-flex align-items-center gap-2 me-5"
                        href="{{ route('admin.rooms.create') }}">
                        <i class="fa fa-plus"></i>
                        <span>Add New Room</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-2 mb-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Room No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Room Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Description</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Rate</th>
                            <th width="8%" class="text-uppercase text-secondary text-xxs font-weight-bolder">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td class="text-sm font-weight-normal mb-0">{{ $room->room_no }}</td>
                                <td class="text-sm font-weight-normal mb-0">{{ $room->name }}</td>
                                <td class="text-sm font-weight-normal mb-0">{{ $room->description }}</td>
                                <td class="text-sm font-weight-normal mb-0">{{ $room->rate }}</td>
                                <td class="justify-content-center d-flex">
                                    <a href="{{ route('admin.rooms.edit', $room->uuid) }}" class="text-info px-1 btn edit"
                                        title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.rooms.destroy', $room->uuid) }}" method="POST">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
