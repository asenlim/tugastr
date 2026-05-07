<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS kamu -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background: #f1f3f5;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="login-box">

        <h3 class="text-center mb-4">Login</h3>

        <!-- Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Remember -->
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input">
                <label class="form-check-label">Remember me</label>
            </div>

            <!-- Button -->
            <button class="btn btn-primary w-100">
                Login
            </button>
        </form>

        <div class="text-center mt-3">
            <small>
                Belum punya akun?
                <a href="{{ route('register') }}">Register</a>
            </small>
        </div>

    </div>

</div>

</body>
</html>