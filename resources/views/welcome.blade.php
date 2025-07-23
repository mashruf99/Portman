<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portman</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    @endif
</head>




<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    <script src="{{ asset('js/welcome.js') }}"></script>

    <body>
        <div class="container">
            <div class="form-box login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>Login</h1>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <div class="forgot-link">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>

            <div class="form-box register">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>Registration</h1>
                    <div class="input-box">
                        <input type="text" name="name" placeholder="Username" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" required>
                        <i class='bx bxs-envelope'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <button type="submit" class="btn">Register</button>
                </form>
            </div>

            <div class="toggle-box">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome to Portman!</h1>
                    <p>Don't have an account?</p>
                    <button class="btn register-btn">Register</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>Already have an account?</p>
                    <button class="btn login-btn">Login</button>
                </div>
            </div>
        </div>
        <button id="theme-toggle" class="theme-toggle">
            Change theme
        </button>

        <script src="{{ asset('js/welcome.js') }}"></script>
        <script>
            const toggleBtn = document.getElementById('theme-toggle');
            const body = document.body;

            // Load saved theme
            if (localStorage.getItem('theme') === 'dark') {
                body.classList.add('dark');
            }

            toggleBtn.addEventListener('click', () => {
                body.classList.toggle('dark');
                const mode = body.classList.contains('dark') ? 'dark' : 'light';
                localStorage.setItem('theme', mode);
            });
        </script>

    </body>




    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>