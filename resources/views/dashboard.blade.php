@extends('layouts.app')

@section('content')
    <div class="px-10 py-8">
        <h1 class="text-3xl font-bold mb-8">Welcome back!</h1>

        <div class="flex flex-wrap -mx-4">
            <!-- Total Users Card -->
            <div class="w-full md:w-1/2 px-4 mb-8">
                <div class="bg-white p-10 rounded-3xl shadow-lg h-full">
                    <h2 class="text-xl font-semibold text-gray-700">Total Users</h2>
                    <p class="text-5xl font-bold text-blue-600 mt-6">{{ $totalUsers }}</p>
                </div>
            </div>

            <!-- Total Bookings Card -->
            <div class="w-full md:w-1/2 px-4 mb-8">
                <div class="bg-white p-10 rounded-3xl shadow-lg h-full">
                    <h2 class="text-xl font-semibold text-gray-700">Total Bookings</h2>
                    <p class="text-5xl font-bold text-green-600 mt-6">{{ $totalBookings }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection