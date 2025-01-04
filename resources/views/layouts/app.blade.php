<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bali Art Markets</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .form-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .switch-form {
            margin-top: 15px;
            font-size: 14px;
        }
        .switch-form a {
            color: #007bff;
            text-decoration: none;
        }
        .switch-form a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Register Form -->
        <div class="form-container" id="registerForm" style="display: block;">
            <h1>{{ __('Register') }}</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn">
                    {{ __('Register') }}
                </button>
            </form>
            <div class="switch-form">
                {{ __('Already have an account?') }} <a href="#" onclick="toggleForms()">{{ __('Login') }}</a>
            </div>
        </div>

        <!-- Login Form -->
        <div class="form-container" id="loginForm" style="display: none;">
            <h1>{{ __('Login') }}</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                </div>
                <button type="submit" class="btn">
                    {{ __('Login') }}
                </button>
            </form>
            <div class="switch-form">
                {{ __('Don\'t have an account?') }} <a href="#" onclick="toggleForms()">{{ __('Register') }}</a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function toggleForms() {
            const registerForm = document.getElementById('registerForm');
            const loginForm = document.getElementById('loginForm');
            if (registerForm.style.display === 'none') {
                registerForm.style.display = 'block';
                loginForm.style.display = 'none';
            } else {
                registerForm.style.display = 'none';
                loginForm.style.display = 'block';
            }
        }
    </script>
</body>
</html>
