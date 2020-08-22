<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
    <h1>Create a New Posts</h1>
</div>
<form action="/posts" method="POST">
    @csrf
    <label for="requested_day">Choose your available days:</label>

    <p>Date: <input type="text" name="requested_day" id="datepicker"></p>

    <label for="event_name">Name of Event</label>
    <input type="text" name="event_name">

    <select name="start_time">
        @foreach($times as $timeSlot)
            <option value="{{ $timeSlot->actual_time }}">{{ $timeSlot->actual_time }}</option>
        @endforeach
    </select>

    <select name="end_time">
        @foreach($times as $timeSlot)
            <option value="{{ $timeSlot->actual_time }}">{{ $timeSlot->actual_time }}</option>
        @endforeach
    </select>
    <input type="submit">
</form>

</body>
</html>
