<!-- Admin Sidebar Navigation -->
<aside class="fixed top-0 left-0 w-64 h-full bg-indigo-900 text-white flex flex-col z-50">
    
    <!-- Logo/Header -->
    <div class="px-6 py-6 border-b border-indigo-800">
        <a href="/admin/dashboard" class="text-2xl font-bold">Zulacart</a>
        <p class="text-xs text-indigo-300 mt-1">Admin Panel</p>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        <a href="/admin/dashboard" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-800 transition {{ request()->is('admin/dashboard') ? 'bg-indigo-800' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="/admin/products" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-800 transition {{ request()->is('admin/products*') ? 'bg-indigo-800' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="font-medium">Products</span>
        </a>

        <a href="/admin/categories" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-800 transition {{ request()->is('admin/categories*') ? 'bg-indigo-800' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <span class="font-medium">Categories</span>
        </a>

        <a href="/admin/orders" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-800 transition {{ request()->is('admin/orders*') ? 'bg-indigo-800' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span class="font-medium">Orders</span>
        </a>

        <div class="pt-4 mt-4 border-t border-indigo-800">
            <a href="/" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-800 transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                <span class="font-medium">View Website</span>
            </a>
        </div>
    </nav>

    <!-- Logout Button at Bottom -->
    <div class="px-4 py-6 border-t border-indigo-800">
        <form action="/admin/logout" method="POST">
            @csrf
            <button type="submit" class="flex items-center w-full px-4 py-3 rounded-lg hover:bg-red-600 transition text-left">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>

</aside>