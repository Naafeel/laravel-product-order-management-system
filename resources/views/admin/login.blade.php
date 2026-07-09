<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-10">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-indigo-600">Zulacart</h1>
            <p class="text-gray-600 mt-3">Admin Portal Access</p>
        </div>

        <!-- Error Message -->
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/admin/login" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" value="guest@zulacart.com" required
                       class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-indigo-600">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" value="admin123" required
                       class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-indigo-600">
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-2xl text-lg font-semibold hover:bg-indigo-700">
                Sign In to Admin
            </button>
        </form>
    </div>

</body>
</html>