<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Room Booking APP" />
    <meta name="author" content="Sreeharsh" />
    <!--csrf-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--title-->
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link href="{{ asset('assets/css/material-kit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('https://kit.fontawesome.com/42d5adcbca.js') }}" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    @include('frontend.includes.navbar')
    <div id="main" class="">
        @yield('content')
    </div>
    @include('frontend.includes.footer')
    @stack('scripts')
</body>
<script type="text/javascript">
    function calculateRooms() {
        var guests = parseInt(document.getElementById("guests").value);
        if (isNaN(guests) || guests < 0) {
            alert("Please enter a valid number of persons.");
            return;
        }

        var rooms;
        if (guests <= 2) {
            rooms = 1;
        } else {
            rooms = Math.ceil(guests / 2);
        }

        document.getElementById('roomsRequired').innerText = `Number of rooms needed: ${rooms}`;
    }

    $(document).ready(function() {
        $('#start_date, #end_date').change(function() {
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            console.log(end_date, start_date)
            if (start_date && end_date) {
                $.ajax({
                    url: '/get-available-rooms',
                    type: 'GET',
                    data: { start_date: start_date, end_date: end_date },
                    success: function(data) {
                        var options = '<option value="">Select a room</option>';
                        $.each(data.rooms, function(index, room) {
                            options += '<option value="' + room.uuid + '">' + room.room_no + '</option>';
                        });
                        console.log(data.rooms)
                        $('#room_id').html(options);
                    }
                });
            }
        });
    });
</script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<!-- Core -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('assets/js/material-kit.min.js') }}"></script>

</html>
