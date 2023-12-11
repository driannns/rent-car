<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RentCar</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="relative flex">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm">Dashboard</a>
            @else
            <a href="{{ route('login') }}"
                class="font-semibold hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm">Log
                in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 font-semibold hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm">Register</a>
            @endif
            @endauth
        </div>
        @endif
        <div class="w-1/2 grid place-items-center h-screen p-5">
            <img src="{{ asset('assets/welcome.png') }}" alt="Rent Car">
        </div>
        <div class="w-1/2 font-medium text-center grid place-items-center p-5">
            Selamat datang di RentCar, destinasi pilihan untuk menyewa mobil terbaik dan memulai petualangan tanpa batas
            Anda! Dengan layanan kami yang unggul, kendaraan berkualitas tinggi, dan harga yang kompetitif, RentCar
            menghadirkan pengalaman menyewa mobil yang tak terlupakan. Temukan kenyamanan dan kebebasan menjelajahi kota
            atau merencanakan perjalanan bisnis Anda dengan armada mobil terkini kami. Bergabunglah dengan ribuan
            pelanggan yang puas dan nikmati perjalanan Anda dengan RentCar - karena kebebasan berada di setiap kemudi.
        </div>
    </div>
</body>

</html>
