<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Delicious Bites')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <!-- Include Header -->
    @include('layouts.header')

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    <!-- Include Footer -->
    @include('layouts.footer')

</body>
</html>