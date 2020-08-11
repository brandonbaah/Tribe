<html>

<body>
<div align="center">
    <h1>Create a New Profile</h1>
</div>
<form action="/posts" method="POST">
    @csrf
    <label for="days">Choose your available days:</label>

    <select name="requested_day">
        @foreach($daysOfWeek as $day)
            <option value="{{ $day }}"> {{ $day }} </option>
        @endforeach
    </select>

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
