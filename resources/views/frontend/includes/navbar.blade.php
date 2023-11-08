<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav
                class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid px-0">
                    <a class="navbar-brand font-weight-bolder ms-sm-3" href="/" rel="tooltip" title="Sreeharsh"
                        data-placement="bottom" target="_blank">
                        BookNest
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                        <ul class="navbar-nav navbar-nav-hover ms-auto">
                            <li class="nav-item mx-2">
                                <a href="/" class="nav-link ps-2 d-flex cursor-pointer align-items-center">
                                    <i class="material-icons opacity-6 me-2 text-md"></i>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a href="{{ route('user.rooms.index') }}" class="nav-link ps-2 d-flex cursor-pointer align-items-center">
                                    <i class="material-icons opacity-6 me-2 text-md"></i>
                                    Rooms
                                </a>
                            </li>
                            @if(auth()->guard('user')->check())
                            <li class="nav-item mx-2">
                                <a href="{{ route('user.booking.index') }}" class="nav-link ps-2 d-flex cursor-pointer align-items-center me-4">
                                    <i class="material-icons opacity-6 me-2 text-md"></i>
                                    My Bookings
                                </a>
                            </li>
                            @endif

                            @if(!auth()->guard('user')->check())
                            <li class="nav-item my-auto ms-4 me-2 ms-lg-0">
                                <a href="/login" class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">Sign
                                    In</a>
                            </li>
                            @endif

                            @if(auth()->guard('user')->check())
                            <li class="nav-item my-auto ms-4 me-2 ms-lg-0">
                                <a href="/logout" class="btn btn-sm  bg-gradient-danger  mb-0 me-1 mt-2 mt-md-0">Sign
                                    Out</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>
</div>
