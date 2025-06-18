<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Radar RGB System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Orbitron Font for futuristic look -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet" />

    <style>
        body {
            background: url('/images/radar-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
            color: #7CFC00; /* Brighter neon green */
        }

        /* Darker translucent overlay to improve contrast */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 0, 0, 0.75);
            z-index: -1;
        }

        .auth-card {
            background: rgba(0, 0, 0, 0.85);
            border: 2px solid #7CFC00;
            border-radius: 18px;
            box-shadow:
                0 0 10px #7CFC00,
                0 0 25px #7CFC00,
                0 0 35px #7CFC00,
                0 0 50px #7CFC00;
            padding: 3rem 3.5rem;
            max-width: 460px;
            margin: 6rem auto;
            color: #7CFC00;
            text-shadow:
                0 0 10px #7CFC00,
                0 0 20px #7CFC00,
                0 0 30px #7CFC00,
                0 0 40px #7CFC00;
        }

        .logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .logo h1 {
            font-size: 3rem;
            font-weight: 900;
            letter-spacing: 4px;
            color: #7CFC00;
            text-shadow:
                0 0 15px #7CFC00,
                0 0 30px #7CFC00,
                0 0 45px #7CFC00,
                0 0 60px #7CFC00,
                0 0 75px #7CFC00;
            margin: 0;
        }

        a {
            color: #7CFC00;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        input, button {
            font-family: 'Orbitron', sans-serif;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="logo">
            <h1>Radar RGB System</h1>
        </div>

        <!-- Page Content -->
        {{ $slot }}
    </div>
</body>
</html>
