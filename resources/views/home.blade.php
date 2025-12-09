<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fuel Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <span class="text-2xl font-bold text-indigo-600">⛽ Fuel Manager</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('driver.dashboard') }}" 
                               class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="bg-indigo-600 text-white hover:bg-indigo-700 px-4 py-2 rounded-md text-sm font-medium">
                                Register
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Fuel Management</span>
                        <span class="block text-indigo-600">Made Simple</span>
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Streamline your fleet fuel management with our comprehensive platform. Track fuel consumption, manage drivers, and monitor expenses all in one place.
                    </p>
                    <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                        @guest
                            <div class="rounded-md shadow">
                                <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                    Get Started
                                </a>
                            </div>
                            <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                                <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                    Login
                                </a>
                            </div>
                        @else
                            <div class="rounded-md shadow">
                                <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('driver.dashboard') }}" 
                                   class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                    Go to Dashboard
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Everything you need to manage fuel
                    </h2>
                    <p class="mt-4 text-xl text-gray-500">
                        A complete solution for fuel management and fleet tracking
                    </p>
                </div>

                <div class="mt-10">
                    <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Feature 1 -->
                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white text-2xl mb-4">
                                👤
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Driver Management</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Register drivers, upload documents, and manage approvals seamlessly.
                            </p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white text-2xl mb-4">
                                🚗
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Vehicle Tracking</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Add vehicles with documents, track status, and manage approvals efficiently.
                            </p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white text-2xl mb-4">
                                ⛽
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Fuel Requests</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Request fuel on credit and track all transactions in real-time.
                            </p>
                        </div>

                        <!-- Feature 4 -->
                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white text-2xl mb-4">
                                📊
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Analytics Dashboard</h3>
                            <p class="mt-2 text-base text-gray-500">
                                View detailed statistics and insights about fuel consumption and costs.
                            </p>
                        </div>

                        <!-- Feature 5 -->
                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white text-2xl mb-4">
                                📝
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Transaction History</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Complete records of all fuel transactions with detailed information.
                            </p>
                        </div>

                        <!-- Feature 6 -->
                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white text-2xl mb-4">
                                🔒
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Secure & Reliable</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Role-based access control ensures data security and proper authorization.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works Section -->
        <div class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        How It Works
                    </h2>
                </div>

                <div class="mt-10">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                        <div class="text-center">
                            <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 text-2xl font-bold mx-auto mb-4">
                                1
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Register</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Create your driver account and upload ID documents
                            </p>
                        </div>

                        <div class="text-center">
                            <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 text-2xl font-bold mx-auto mb-4">
                                2
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Get Approved</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Wait for admin verification and approval
                            </p>
                        </div>

                        <div class="text-center">
                            <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 text-2xl font-bold mx-auto mb-4">
                                3
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Add Vehicle</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Register your vehicle with documents for approval
                            </p>
                        </div>

                        <div class="text-center">
                            <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 text-2xl font-bold mx-auto mb-4">
                                4
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Request Fuel</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Start requesting fuel on credit and track expenses
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-indigo-700">
            <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    <span class="block">Ready to get started?</span>
                    <span class="block">Create your account today.</span>
                </h2>
                <p class="mt-4 text-lg leading-6 text-indigo-200">
                    Join our fuel management platform and streamline your operations.
                </p>
                @guest
                    <a href="{{ route('register') }}" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
                        Sign up for free
                    </a>
                @endguest
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-base text-gray-400">
                    &copy; {{ date('Y') }} Fuel Management System. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>