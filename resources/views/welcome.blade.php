<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f7fafc;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        h1 {
            font-size: 3rem;
            color: #2d3748;
            margin-bottom: 20px;
        }
        .links {
            display: flex;
            gap: 20px;
        }
        .links a {
            font-size: 1rem;
            font-weight: 600;
            color: #1a202c;
            text-decoration: none;
        }
        .links a:hover {
            color: #e53e3e;
        }
    </style>
</head>
<body>
    <h1>Welcome to Car Rent Service</h1>
    
    @if (Route::has('login'))
        <div class="links">
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</body>
</html>
