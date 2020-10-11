<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div align="center">
    <h1>Send a Tribe Invite</h1>
</div>
<form action="/invitations" method="POST">
    @csrf
    <p>Email: <input type="text" name="email" placeholder="Enter email"></p>
    <p>Full Name: <input type="text" name="event_name" placeholder="Enter full name"></p>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="submit">
</form>

</body>
</html>
