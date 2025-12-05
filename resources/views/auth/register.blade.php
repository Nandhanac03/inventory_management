<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Poppins", sans-serif;
        }

        .register-card {
            width: 420px;
            background: #fff;
            border-radius: 15px;
            padding: 25px 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            animation: slide 0.4s ease-in-out;
        }

        @keyframes slide {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .register-card h3 {
            font-weight: bold;
            background: linear-gradient(to right, #4e73df, #1cc88a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .register-card button {
            background: linear-gradient(45deg, #4e73df, #1cc88a);
            border: none;
        }

        .register-card button:hover {
            background: linear-gradient(45deg, #1cc88a, #4e73df);
        }

        .footer-link {
            font-size: 0.9rem;
            margin-top: 10px;
        }

    </style>
</head>
<body>

<div class="register-card">

    <h3 class="text-center mb-3">Create Account</h3>

    @if ($errors->any())
        <div class="alert alert-danger py-2">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li style="font-size: 0.9rem;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
    </form>

    <p class="text-center footer-link">
        Already have an account?
        <a href="{{ route('login') }}" class="text-primary fw-bold">Login</a>
    </p>

</div>

</body>
</html>
