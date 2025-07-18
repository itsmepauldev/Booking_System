@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Edit User</h2>

    @if($errors->any())
        <div class="mb-4 text-red-500">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <div class="pt-4 flex gap-4">
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                Update User
            </button>

            <a href="{{ route('users.index') }}"
                class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200 font-semibold text-center">
                Cancel
            </a>
        </div>
    </form>
@endsection