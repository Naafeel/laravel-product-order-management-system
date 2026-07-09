<!-- Admin Navigation Bar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/admin/dashboard" class="text-2xl font-bold text-indigo-600">Zulacart Admin</a>
        <div class="flex items-center gap-6">
            <a href="/admin/dashboard" class="text-gray-600 hover:text-indigo-600 font-medium">Dashboard</a>
            <a href="/admin/products" class="text-gray-600 hover:text-indigo-600 font-medium">Products</a>
            <a href="/admin/categories" class="text-gray-600 hover:text-indigo-600 font-medium">Categories</a>
            <a href="/admin/orders" class="text-gray-600 hover:text-indigo-600 font-medium">Orders</a>
            <a href="/" class="text-gray-600 hover:text-indigo-600 font-medium">View Website</a>
            
            <!-- Logout Button -->
            <form action="/admin/logout" method="POST" class="inline-block">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Logout</button>
            </form>
        </div>
    </div>
</nav>