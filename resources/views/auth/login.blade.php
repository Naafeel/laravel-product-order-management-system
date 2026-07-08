<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-10">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-indigo-600">Zulacart</h1>
            <p class="text-gray-600 mt-3">Sign in to your account</p>
        </div>

        <form class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" 
                       class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-indigo-600"
                       placeholder="you@example.com">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" 
                       class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-indigo-600"
                       placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="w-5 h-5 text-indigo-600">
                    <span class="ml-3 text-sm text-gray-600">Remember me</span>
                </label>
                <a href="#" class="text-sm text-indigo-600 hover:underline">Forgot password?</a>
            </div>

            <button type="button" onclick="alert('Login functionality will be added in Week 4!')"
                    class="w-full bg-indigo-600 text-white py-4 rounded-2xl text-lg font-semibold hover:bg-indigo-700">
                Sign In
            </button>
        </form>

        <p class="text-center mt-8 text-sm text-gray-600">
            Don't have an account? 
            <a href="#" class="text-indigo-600 font-medium hover:underline">Sign up</a>
        </p>
    </div>

</body>
</html>