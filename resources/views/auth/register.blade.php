<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Website Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .login-container {
            max-width: 420px;
            margin: 100px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn-google {
            background-color: #db4437;
            color: #fff;
            margin-bottom: 20px;
        }

        .btn-google:hover {
            background-color: #c33c2e;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
        }

        .login-footer {
            font-size: 14px;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .divider::before {
            margin-right: 10px;
        }

        .divider::after {
            margin-left: 10px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-header">
            <h2>Register to News Portal</h2>
        </div>

        <button class="btn btn-google w-100">
            <img src="{{ asset('logo/logo.png') }}" width="40" alt="Google Logo" style="margin-right: 8px;">
            Continue with Google
        </button>

        <div class="divider">OR</div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ route('store') }}" method="post">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <input type="email" name="email" class="form-control" placeholder="Email address" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <div class="login-footer">
            <a href="#">Forgot Password?</a><br>
            <a href="{{ route('login') }}">Already created account</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
