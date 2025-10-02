<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-100 text-gray-800">

    {{-- Navbar example --}}
    <nav class="bg-white shadow p-4">
        <h1 class="text-xl font-bold text-blue-600">My Laravel App</h1>
    </nav>

    {{-- Page Content --}}
    <main class="container mx-auto mt-6">
        @yield('content')
    </main>

</body>

</html>
