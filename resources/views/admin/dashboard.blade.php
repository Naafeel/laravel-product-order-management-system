<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Admin Header -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">Zulacart Admin</h1>
            <div class="flex items-center gap-6">
                <a href="/admin/dashboard" class="text-gray-600 hover:text-indigo-600 font-semibold">Dashboard</a>
                <a href="/admin/products" class="text-gray-600 hover:text-indigo-600">Products</a>
                <a href="/admin/categories" class="text-gray-600 hover:text-indigo-600">Categories</a>
                <!-- WE ADDED THIS LINE -->
                <a href="/admin/orders" class="text-gray-600 hover:text-indigo-600">Orders</a>
                <a href="/" class="text-gray-600 hover:text-indigo-600">View Website</a>
                
                <!-- Logout Button -->
                <form action="/admin/logout" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Welcome back, Admin!</h2>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            
            <!-- Total Revenue Card -->
            <div class="bg-white p-6 rounded-xl shadow border-l-4 border-green-500">
                <p class="text-gray-500 text-sm uppercase font-semibold">Total Revenue</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">${{ number_format($totalRevenue, 2) }}</p>
            </div>

            <!-- Total Orders Card -->
            <div class="bg-white p-6 rounded-xl shadow border-l-4 border-blue-500">
                <p class="text-gray-500 text-sm uppercase font-semibold">Total Orders</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalOrders }}</p>
            </div>

            <!-- Total Products Card -->
            <div class="bg-white p-6 rounded-xl shadow border-l-4 border-indigo-500">
                <p class="text-gray-500 text-sm uppercase font-semibold">Total Products</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalProducts }}</p>
            </div>

            <!-- Total Categories Card -->
            <div class="bg-white p-6 rounded-xl shadow border-l-4 border-purple-500">
                <p class="text-gray-500 text-sm uppercase font-semibold">Total Categories</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalCategories }}</p>
            </div>

        </div>

        <!-- Quick Links -->
        <div class="bg-white p-8 rounded-xl shadow">
            <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
            <div class="flex gap-4">
                <a href="/admin/products/create" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">+ Add New Product</a>
                <a href="/admin/categories/create" class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-300">+ Add New Category</a>
            </div>
        </div>
    </div>

</body>
</html>