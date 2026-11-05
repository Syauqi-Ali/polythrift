<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Login - Polythrift' }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #c6e1f5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 330px;
            background: #fff;
            border-radius: 9px;
            padding: 30px 25px;
            box-shadow: 0 4px 15px rgba(30, 70, 100, 0.10);
        }

        .brand {
            text-align: center;
            color: #174d91;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 22px;
        }

        .brand span {
            color: #55a9df;
        }

        .login-card input {
            width: 100%;
            margin-bottom: 14px;
        }

        .login-card button {
            width: 100%;
        }

        .login-card a {
            color: #174d91;
        }

        @media (max-width: 400px) {
            .login-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>
    <main class="login-card">
        <div class="brand">
            POLY<span>THRIFT</span>
        </div>

        {{ $slot }}
    </main>

    @persist('toast')
        <flux:toast.group>
            <flux:toast />
        </flux:toast.group>
    @endpersist

    @fluxScripts
</body>
</html>