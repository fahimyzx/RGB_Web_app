<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Radar RGB Data Processing System</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #000000;
            font-family: 'Orbitron', sans-serif;
            color: #7CFC00; /* neon green */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            position: relative;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow:
                0 0 10px #7CFC00,
                0 0 20px #7CFC00,
                0 0 30px #7CFC00,
                0 0 40px #7CFC00;
        }

        p.warning {
            max-width: 600px;
            font-size: 1.1rem;
            line-height: 1.5;
            color: #FF4500; /* bright orange-red for warning */
            text-shadow: 0 0 5px #FF4500;
            margin-top: 2rem;
            font-weight: bold;
        }

        /* Navigation links */
        .top-right {
            position: absolute;
            right: 20px;
            top: 20px;
        }

        .top-right a {
            color: #7CFC00;
            font-weight: 700;
            margin-left: 20px;
            text-decoration: none;
            font-size: 1.1rem;
            text-shadow:
                0 0 5px #7CFC00,
                0 0 10px #7CFC00;
            transition: color 0.3s ease;
        }

        .top-right a:hover {
            color: #32CD32; /* lighter green */
            text-shadow:
                0 0 10px #32CD32,
                0 0 20px #32CD32;
        }
    </style>
</head>
<body>
    <div class="top-right">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>

    <h1>Radar RGB Data Processing System</h1>

    <p class="warning">
        <strong>Important Notice:</strong><br>
        This system is intended for internal use only.<br>
        Do <em>not</em> share or process public or sensitive data here.<br>
        Unauthorized use may lead to data breaches and legal consequences.<br>
        Please handle all data responsibly and securely.
    </p>
</body>
</html>
