@props(['title'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek Laravel Polythrift</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <div class="text-center mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="POLYTHRIFT" class="w-20 h-20">
                <h2 class="text-2xl font-bold">{{ $title }}</h2>
            </div>
            @yield('content')
        </div>
    </div>
</body>
</html>