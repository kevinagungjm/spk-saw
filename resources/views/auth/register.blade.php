<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Admin</title>

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

        <h4 class="text-center mb-4 fw-bold">Register Admin</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    required
                    autofocus
                >
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required
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

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    required
                >
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Register
            </button>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-decoration-none">
                    Sudah punya akun? Login
                </a>
            </div>

        </form>

    </div>
</div>

</body>
</html>
