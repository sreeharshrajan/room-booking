<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Room Booking APP" />
    <meta name="author" content="Sreeharsh" />
    {{-- <title>{{ $title }} | {{ config('app.name') }}</title> --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link href="{{ asset('assets/css/material-kit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('https://kit.fontawesome.com/42d5adcbca.js') }}" crossorigin="anonymous"></script>
</head>

<body>

    <div id="main" class="">
        @yield('content')
    </div>
</body>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<!-- Core -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('assets/js/material-kit.min.js') }}"></script>
</html>
