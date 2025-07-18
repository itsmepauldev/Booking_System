@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 w-full">
        <h2 class="text-2xl font-bold mb-4">Edit Booking</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bookings.update', $booking->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $booking->title }}"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                <textarea name="description" id="description"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300">{{ $booking->description }}</textarea>
            </div>

            <div>
                <label for="book_date" class="block font-medium text-sm text-gray-700">Book Date</label>
                <input type="date" name="book_date" id="book_date" value="{{ $booking->book_date }}"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label for="book_time" class="block font-medium text-sm text-gray-700">Book Time</label>
                <input type="time" name="book_time" id="book_time" value="{{ $booking->book_time }}"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300" required>
            </div>

            <div class="pt-4 flex gap-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                    Update Booking
                </button>

                <a href="{{ route('bookings.index') }}"
                    class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200 font-semibold text-center">
                    Cancel
                </a>
            </div>

        </form>
    </div>
@endsection