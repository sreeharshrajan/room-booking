@extends('layouts.admin')
@section('content')
    <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7 card">
        <div class="container border-bottom">
            <div class="row justify-space-between py-2">
                <div class="col-4 me-auto">
                    <p class="lead text-dark pt-1 mb-0">Edit User Details</p>
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
            <form class="row" action="{{ route('admin.user.update', $user->uuid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="name">Name</label>
                        <input type="text" class="form-control disabled @error('name') is-invalid @enderror"
                            name="name" value='{{ $user->name }}'>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        value="{{ $user->username }}" />
                    </div>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="input-group input-group-static my-3">
                        <label class="" for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email"
                            type="email" value="{{ $user->email }}" />
                    </div>
                    @error('email')
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
