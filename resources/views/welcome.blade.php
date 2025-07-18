<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="text-center bg-white p-10 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome to Booking Management</h1>
        <p class="mb-6 text-gray-600">Please login or register to continue</p>

        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                Register
            </a>
        </div>
    </div>

</body>

</html>
