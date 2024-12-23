<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Three J Rental Motor')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Your compiled CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body class="antialiased bg-gray-100">
    <!-- Navbar -->
    @include('admin.partials.navbar')

    <!-- Main Content -->
    <main class=" pb-10 min-h-screen">
        <div class="md:px-32 px-4 mt-5">
            @if (Session::has('success'))
                <div class="bg-green-200 mb-3  text-green-950 border rounded-md border-gray-300 mt-3 py-3 px-4">
                    {{ Session::get('success') }}
                </div>
            @endif
           


        @yield('content')
        </div>
    </main>

    <!-- Footer -->
    @include('admin.partials.footer')

    <script src="{{ mix('js/app.js') }}"></script> <!-- Your compiled JavaScript -->
</body>
</html>
