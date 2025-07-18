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
            <header class="bg-white shadow p-4 relative">
                <div class="max-w-7xl mx-auto flex justify-between items-center">
                    <span class="font-semibold">Welcome, {{ Auth::user()->name }}</span>

                    <!-- Notification Bell -->
                    <div class="relative">
                        <button id="notifBtn" class="relative focus:outline-none">
                            <!-- Bell Icon -->
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            @if($bookings->count() > 0)
                                <span
                                    class="absolute -top-1 -right-1 inline-flex items-center justify-center px-1 py-0.5 text-xs font-bold text-white bg-red-600 rounded-full">
                                    {{ $bookings->count() }}
                                </span>
                            @endif
                        </button>

                        <!-- Notification Dropdown -->
                        <div id="notifDropdown"
                            class="hidden absolute right-0 mt-2 w-72 bg-white rounded shadow-lg z-50 border text-sm">
                            <div class="px-4 py-2 font-semibold border-b">Booking Notifications</div>
                            <ul class="max-h-60 overflow-y-auto">
                                @forelse($bookings as $booking)
                                    <li class="px-4 py-2 hover:bg-gray-100 border-b">
                                        <div class="font-medium">{{ $booking->title }}</div>
                                        <div class="text-gray-600">
                                            {{ \Carbon\Carbon::parse($booking->book_date)->format('F j, Y') }}
                                            at
                                            {{ \Carbon\Carbon::parse($booking->book_time)->format('g:i A') }}
                                        </div>

                                    </li>
                                @empty
                                    <li class="px-4 py-2 text-gray-500">No bookings yet.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </header>


            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>

    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notifBtn = document.getElementById('notifBtn');
        const notifDropdown = document.getElementById('notifDropdown');

        notifBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            notifDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!notifDropdown.contains(e.target)) {
                notifDropdown.classList.add('hidden');
            }
        });
    });
</script>

</html>