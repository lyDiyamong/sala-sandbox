<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .auth-bg {
            background-image: url('/images/auth-bg.png');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased ">
    <div class=" min-h-screen flex">
        <!-- Left side - Login Form -->
        <div class="w-full md:w-5/12 flex flex-col justify-center items-center p-8">
            <div class="mb-8">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('assets/images/sala-sandbox.png') }}" alt="Logo" class="w-full h-auto">
                </a>
            </div>

            <div >{{ $slot }}</div>

            <div class=" text-sm text-gray-500 mt-20">
                <p>Copyright ©{{ date('Y') }} Produced by sala tech solution</p>
            </div>
        </div>

        <!-- Right side - Background Image -->
        <div class="hidden md:block md:w-7/12 bg-auth-bg ">
            <!-- Using the correct path for the image in resources/assets/images -->
            <div class="flex justify-center p-20">
                <img src="{{ asset('assets/images/auth-bg.png') }}" alt="Background Image" class="w-full ">
            </div>
        </div>
    </div>
</body>

</html>
