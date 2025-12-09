<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EW Fuel App</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex flex-col">

    <!-- Header -->
    <header class="w-full px-6 lg:px-8 py-4 flex justify-between items-center border-b border-zinc-200 dark:border-zinc-700">
        <div class="text-2xl font-semibold text-green-600">EW</div>
        <nav class="flex gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-md border border-green-600 text-green-600 hover:bg-green-50 dark:hover:bg-green-900">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="flex flex-col lg:flex-row items-center justify-between px-6 lg:px-20 py-16 lg:py-32 gap-10 lg:gap-20">
        <!-- Text Content -->
        <div class="max-w-lg">
            <h1 class="text-4xl lg:text-5xl font-bold mb-6 text-[#1b1b18] dark:text-white">
                Fuel on Credit. Pay at Month End.
            </h1>
            <p class="text-lg mb-6 text-zinc-600 dark:text-zinc-400">
                EW (Ephram Wendy) allows drivers to register and get fuel on credit. Manage your fuel easily, track usage, and pay conveniently at the end of the month.
            </p>
            <div class="flex gap-4">
                <a href="{{ route('register') }}" class="px-6 py-3 rounded-md bg-green-600 text-white font-medium hover:bg-green-700 transition">Get Started</a>
                <a href="{{ route('login') }}" class="px-6 py-3 rounded-md border border-green-600 text-green-600 hover:bg-green-50 dark:hover:bg-green-900 transition">Log In</a>
            </div>
        </div>

        <!-- Illustration / Image -->
        <div class="flex-1">
            <img src="{{ asset('images/fuel-illustration.svg') }}" alt="Fuel App Illustration" class="w-full max-w-md mx-auto">
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-zinc-50 dark:bg-zinc-900 py-16 px-6 lg:px-20">
        <h2 class="text-3xl font-bold text-center mb-12 text-[#1b1b18] dark:text-white">Why Choose EW?</h2>
        <div class="grid gap-10 lg:grid-cols-3 max-w-6xl mx-auto">
            <div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow hover:shadow-md transition">
                <h3 class="font-semibold text-lg mb-2">Instant Fuel Access</h3>
                <p class="text-zinc-600 dark:text-zinc-400">Get fuel immediately after registration without upfront payment.</p>
            </div>
            <div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow hover:shadow-md transition">
                <h3 class="font-semibold text-lg mb-2">Track Usage</h3>
                <p class="text-zinc-600 dark:text-zinc-400">Monitor your fuel usage and manage your account efficiently.</p>
            </div>
            <div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow hover:shadow-md transition">
                <h3 class="font-semibold text-lg mb-2">Flexible Payment</h3>
                <p class="text-zinc-600 dark:text-zinc-400">Pay conveniently at the end of each month without hassle.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 px-6 lg:px-20 border-t border-zinc-200 dark:border-zinc-700 text-center text-zinc-500 dark:text-zinc-400">
        &copy; {{ date('Y') }} EW - Ephram Wendy Fuel App. All rights reserved.
    </footer>

</body>
</html>

