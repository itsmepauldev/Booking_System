@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 p-10">
        <div class="max-w-6xl mx-auto bg-white p-10 rounded-2xl shadow-md">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Add Booking</h2>

            @if ($errors->any())
                <div class="mb-6 text-red-500">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf

                <div class="col-span-1">
                    <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300"
                        required>
                </div>

                <div class="col-span-1">
                    <label for="book_date" class="block font-medium text-sm text-gray-700">Book Date</label>
                    <input type="date" name="book_date" id="book_date"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300"
                        required>
                </div>

                <div class="col-span-1">
                    <label for="book_time" class="block font-medium text-sm text-gray-700">Book Time</label>
                    <input type="time" name="book_time" id="book_time"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300"
                        required>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300"></textarea>
                </div>

                <div class="col-span-1 md:col-span-2 text-right">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                        Submit Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection