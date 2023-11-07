@extends('layouts.admin')

@section('content')
    <div class="page-header align-items-start min-vh-100"
        style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80');"
        loading="lazy">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-1 ">Admin Login</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <p class="alert alert-danger text-white">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </p>
                            @endif
                            <form role="form" action="{{ route('admin.login') }}"method="post">
                                @csrf
                                <div class=" my-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror px-2"
                                        placeholder="Enter username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class=" mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror px-2"
                                        placeholder="Enter password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="form-check form-switch d-flex align-items-center mb-3">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                </div> --}}
                                <div class="text-center">
                                    <button type="submit" name="submit"
                                        class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                </div>
                                {{-- <p class="mt-4 text-sm text-center">
                                    Don't have an account?
                                </p> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
