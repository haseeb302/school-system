<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
</head>
    <body>
        <h1>Welcome {{ $user->name }}, to the new school.</h1>
        <hr>
        <p>
            We Congratulate you on your role as: {{ $user->role->name }}.<br>
            This is your default password. <strong>12345678</strong>, make sure to change it.
        </p>
    </body>
</html>