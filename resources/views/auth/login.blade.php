<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    
    @include('partials.navbar')

    <!-- This main tag takes up all remaining vertical space and centers its content -->
    <main class="flex-grow flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-10">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-indigo-600">Welcome Back</h1>
                <p class="text-gray-600 mt-2">Sign in to your Zulacart account</p>
            </div>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/login" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
                    Sign In
                </button>
            </form>

            <p class="text-center mt-6 text-sm text-gray-600">
                Don't have an account? 
                <a href="/register" class="text-indigo-600 font-semibold hover:underline">Create One</a>
            </p>
        </div>
    </main>

</body>
</html>