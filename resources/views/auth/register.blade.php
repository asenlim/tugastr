<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS kamu -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background: #f1f3f5;
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-box {
            width: 100%;
            max-width: 420px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="register-wrapper">

    <div class="register-box">

        <h3 class="text-center mb-4">Register</h3>

        <!-- Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

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

            <!-- Confirm Password -->
            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <!-- Button -->
            <button class="btn btn-success w-100">
                Register
            </button>
        </form>

        <div class="text-center mt-3">
            <small>
                Sudah punya akun?
                <a href="{{ route('login') }}">Login</a>
            </small>
        </div>

    </div>

</div>

</body>
</html>