<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Home</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background: #eee;
        font-family: 'Roboto', sans-serif;
    }

    .logo span {
        font-size: 32px;
        font-weight: 500;
    }

    .header {
        background: #fff;
        padding: 25px 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>

<body>
    <div class="header">
        <div class="logo">
            <span>News</span>
        </div>
        <div class="link">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-success">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('registere') }}" class="btn btn-warning">Register</a>
            @endauth
        </div>
    </div>
</body>

</html>
