<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
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
    <h1>Edit Your Post</h1>
</div>
<form action="/posts/{{$post->id}}" method="PATCH">
    @csrf
    <label for="requested_day">Choose your available days:</label>

    <p>Date: <input type="text" name="requested_day" id="datepicker"></p>

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

    <label for="in_home">Choose Location</label>
    <select name="in_home" id="">
        <option value="{{ $inHome[0] }}">My Home</option>
        <option value="{{ $inHome[1] }}">Sitter's Home</option>
    </select>
    <input type="submit">
</form>

<form action="/posts/{{ $post->id}}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form>

</body>
</html>
