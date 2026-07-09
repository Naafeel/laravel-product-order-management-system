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

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/admin/login" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" required
                       class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-indigo-600">
            </div>

            <!-- PASSWORD FIELD WITH TOGGLE -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="admin-password" required
                           class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-indigo-600 pr-12">
                    
                    <button type="button" onclick="togglePassword('admin-password', this)" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                        <svg class="h-5 w-5 text-gray-400 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg class="h-5 w-5 text-gray-400 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-2xl text-lg font-semibold hover:bg-indigo-700">
                Sign In to Admin
            </button>
        </form>
    </div>

    <!-- JavaScript for Password Toggle -->
    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const eyeOpen = button.querySelector('.eye-open');
            const eyeClosed = button.querySelector('.eye-closed');

            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>

</body>
</html>