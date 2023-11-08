<footer class="footer pt-5 mt-5">
    <div class="container">
        <div class=" row">
            <div class="col-md-3 mb-4 ms-auto">
                <div>
                    <a href="#">
                        <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="mb-3 footer-logo" alt="logo">
                    </a>
                    <h6 class="font-weight-bolder mb-4">BookNest</h6>
                </div>
                <div>
                    <ul class="d-flex flex-row ms-n3 nav"  target="_blank">
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="#" >
                                <i class="fab fa-facebook text-lg opacity-8" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="#" target="_blank">
                                <i class="fab fa-twitter text-lg opacity-8" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1" href="#"
                                target="_blank">
                                <i class="fab fa-youtube text-lg opacity-8" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-6 mb-4">
                <div>
                    <h6 class="text-sm">Company</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Contact Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.rooms.index') }}" >
                                Rooms
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-6 mb-4">
                <div>
                    <h6 class="text-sm">Admin</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login-form') }}" target="_blank">
                                Login
                            </a>
                        </li>
                        @if(auth()->guard('admin')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}" >
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}" >
                                Users
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-6 mb-4">
                <h6 class="text-sm">User</h6>
                <ul class="flex-column ms-n3 nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.booking.index') }}" >
                            Bookings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" >
                            Profile
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">

            </div>
            <div class="col-12">
                <div class="text-center">
                    <p class="text-dark my-4 text-sm font-weight-normal">
                        All rights reserved. Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
