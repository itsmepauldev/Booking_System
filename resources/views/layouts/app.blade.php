<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
            <div class="p-6">
                <h6 class="text-2xl font-bold mb-6">Dona Roanna Macy Garcia</h6>
                <h2 class="text-2xl font-bold mb-6">Booking Management</h2>

                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard"
                            class="block py-2 px-4 rounded {{ request()->is('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('bookings.create') }}"
                            class="block py-2 px-4 rounded {{ request()->routeIs('bookings.create') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                            Add Booking
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('bookings.index') }}"
                            class="block py-2 px-4 rounded {{ request()->routeIs('bookings.index') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                            Bookings
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('users.index') }}"
                            class="block py-2 px-4 rounded {{ request()->routeIs('users.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                            Users
                        </a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left py-2 px-4 rounded text-red-400 hover:bg-gray-700">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </aside>


        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar (Minimal or remove if you prefer) -->
            <header class="bg-white shadow p-4">
                <div class="max-w-7xl mx-auto">
                    <span class="font-semibold">Welcome, {{ Auth::user()->name }}</span>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>

    </div>
</body>

</html>