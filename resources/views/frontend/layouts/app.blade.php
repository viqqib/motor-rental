<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Three J Rental Motor')</title>
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Your compiled CSS --> --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="antialiased bg-gray-100">
    <!-- Navbar -->
    @include('frontend.partials.navbar')

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('frontend.partials.footer')
    @vite('resources/js/app.js') <!-- Load JavaScript -->
    
</body>
</html>
