@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Users</h2>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="p-2 border-b">Name</th>
                    <th class="p-2 border-b">Email</th>
                    <th class="p-2 border-b text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="p-2 border-b">{{ $user->name }}</td>
                        <td class="p-2 border-b">{{ $user->email }}</td>
                        <td class="p-2 border-b text-right">
                            <div class="flex justify-end items-center gap-2">
                                <a href="{{ route('users.edit', $user) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-2 text-center">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection