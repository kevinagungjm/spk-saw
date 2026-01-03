<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 25px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }
    </style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-box">

        <h4 class="text-center mb-4 fw-bold">Login Admin</h4>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required
                >
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>
        </form>

    </div>
</div>

</body>
</html>
