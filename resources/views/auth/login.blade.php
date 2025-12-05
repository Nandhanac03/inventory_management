<x-guest-layout>
    <style>
img, svg {
    vertical-align: middle;
    display:none;
}

        </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">

                        <!-- Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input id="email" class="form-control"
                                       type="email" name="email"
                                       value="{{ old('email') }}" required autofocus />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input id="password" class="form-control"
                                       type="password" name="password"
                                       required autocomplete="current-password" />
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember_me">
                                <label for="remember_me" class="form-check-label">Remember Me</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                @if (Route::has('password.request'))
                                    <a class="text-primary" href="{{ route('password.request') }}">
                                        Forgot Password?
                                    </a>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>
                        </form>
                    </div>

                </div>

                {{-- Register Link --}}
                <div class="text-center mt-3">
                    <p>
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-primary">Register</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
