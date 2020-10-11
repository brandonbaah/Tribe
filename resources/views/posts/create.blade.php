<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tribe</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
</head>
<body>
<div align="center">
    <h1>Create a New Event</h1>

<form action="/posts" method="POST">
    @csrf

    <input type="text" name="requested_day" id="datepicker" placeholder="Choose a date"><br><br>

    <input type="text" name="event_name" placeholder="Name of Event"><br><br>

    <label for="event_name">Select start time</label>
    <select name="start_time">
        @foreach($times as $timeSlot)
            <option value="{{ $timeSlot->actual_time }}">{{ $timeSlot->actual_time }}</option>
        @endforeach
    </select><br><br>

    <label for="event_name">Select end time</label>
    <select name="end_time">
        @foreach($times as $timeSlot)
            <option value="{{ $timeSlot->actual_time }}">{{ $timeSlot->actual_time }}</option>
        @endforeach
    </select><br><br>
    <input type="submit">
</form>
</div>
</body>
</html>
