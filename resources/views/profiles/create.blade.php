<html>

    <body>
       <div align="center">
           <h1>Create a New Profile</h1>
       </div>
       <form action="/profiles" method="POST">
           @csrf
           <input type="number" name="child_limit" placeholder="Type in # of children that you are able to sit."><br>
           <label for="days">Choose your available days:</label>

           <select name="days_available[]" multiple="multiple">
               @foreach($daysOfWeek as $day)
                 <option value="{{ $day }}"> {{ $day }} </option>
               @endforeach
           </select>
           <input type="submit">
       </form>

    </body>
</html>
