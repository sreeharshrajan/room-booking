<!-- Navbar Dark -->

<nav class="navbar navbar-expand-lg navbar-light bg-gradient-primary z-index-3 py-3">
    <div class="container">
        <a class="navbar-brand text-white" href="" rel="tooltip" title="" data-placement="bottom"
            target="_blank">
            BookNest
        </a>
        <a class="btn btn-sm  bg-gradient-warning  btn-round mb-0 ms-auto d-lg-none d-block" href="/logout">
            Sign
            Out</a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bg-dark bar1"></span>
                <span class="navbar-toggler-bar bg-dark bar2"></span>
                <span class="navbar-toggler-bar bg-dark bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mx-auto">
                <li class="nav-item mx-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link text-white ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        role="button">
                        Home
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a href="{{ route('admin.rooms.index') }}"
                        class="nav-link text-white ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        role="button">
                        Rooms
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a href="{{ route('admin.booking.index') }}"
                        class="nav-link text-white ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        role="button">
                        Bookings
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a href="{{ route('admin.user.index') }}"
                        class="nav-link text-white ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        role="button">
                        Users
                    </a>
                </li>

            </ul>

            <ul class="navbar-nav d-lg-block d-none">
                @if (auth()->guard('admin')->check())
                    <li class="nav-item my-auto ms-3 ms-lg-0">
                        <a href="{{ route('admin.logout') }}" class="btn btn-sm  bg-gradient-warning  mb-0 me-1 mt-2 mt-md-0">Sign
                            Out</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
