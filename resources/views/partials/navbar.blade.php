<!-- Common Navigation Bar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-3xl font-bold text-indigo-600">Zulacart</a>
        
        <!-- Search Bar -->
        <div class="hidden md:flex flex-1 max-w-lg mx-8">
            <div class="relative w-full">
                <input type="text" placeholder="Search for products..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <div class="flex items-center space-x-6">
            <a href="/" class="hover:text-indigo-600 font-medium">Home</a>
            <a href="/products" class="hover:text-indigo-600 font-medium">Products</a>
            <a href="/cart" class="hover:text-indigo-600 font-medium relative">Cart</a>
            
            <!-- DYNAMIC AUTH LINKS -->
            @guest
                <a href="/login" class="text-gray-600 hover:text-indigo-600 font-medium">Login</a>
                <a href="/register" class="bg-indigo-600 text-white px-4 py-2 rounded-full hover:bg-indigo-700 font-medium">Register</a>
            @endguest

            @auth
                <a href="/account" class="text-gray-600 hover:text-indigo-600 font-medium">My Account</a>
                <form action="/logout" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>