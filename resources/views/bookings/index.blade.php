@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6">All Bookings</h2>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left px-4 py-2">Title</th>
                    <th class="text-left px-4 py-2">Description</th>
                    <th class="text-left px-4 py-2">Date</th>
                    <th class="text-left px-4 py-2">Time</th>
                    <th class="text-left px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $booking->title }}</td>
                        <td class="px-4 py-2">{{ $booking->description }}</td>
                        <td class="px-4 py-2">{{ $booking->book_date }}</td>
                        <td class="px-4 py-2">{{ $booking->book_time }}</td>
                        <td class="px-4 py-2 flex gap-2">
                            <a href="{{ route('bookings.edit', $booking->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                Edit
                            </a>

                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection