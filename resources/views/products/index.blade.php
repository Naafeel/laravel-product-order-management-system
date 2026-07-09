<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <!-- Navigation -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-indigo-600">Zulacart</h1>
            <div class="space-x-8">
                <a href="/" class="hover:text-indigo-600">Home</a>
                <a href="/products" class="text-indigo-600 font-semibold">Products</a>
                <a href="/cart" class="hover:text-indigo-600">Cart</a>
                <a href="/login" class="hover:text-indigo-600">Login</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-8">
        <h2 class="text-4xl font-bold mb-8">All Products</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <!-- LOOP THROUGH REAL PRODUCTS FROM DATABASE -->
            @forelse($products as $product)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}" 
                         class="w-full h-48 object-cover rounded-t-xl" alt="{{ $product->name }}">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ Str::limit($product->description, 40) }}</p>
                        <p class="text-2xl font-bold text-indigo-600 mt-2">${{ number_format($product->price, 2) }}</p>
                        <a href="/product/{{ $product->id }}" 
                           class="block text-center bg-indigo-600 text-white py-2 mt-4 rounded-lg hover:bg-indigo-700">
                            View Details
                        </a>
                    </div>
                </div>
            @empty
                <!-- If there are no active products in the database -->
                <p class="text-gray-500 text-center col-span-4 py-8 text-xl">No products available right now. Please check back later!</p>
            @endforelse

        </div>
    </div>

</body>
</html>