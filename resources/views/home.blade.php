<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zulacart - Shop Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <!-- Navigation with Search Bar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-indigo-600">Zulacart</h1>
            
            <!-- Search Bar (UI/UX Improvement) -->
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
                <a href="/products" class="hover:text-indigo-600 font-medium">Products</a>
                <a href="/cart" class="hover:text-indigo-600 font-medium relative">
                    Cart
                </a>
                <a href="/login" class="bg-indigo-600 text-white px-4 py-2 rounded-full hover:bg-indigo-700 font-medium">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Modern Gradient & Badge) -->
    <div class="relative bg-gradient-to-r from-indigo-600 to-purple-700 text-white overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32 text-center">
            <span class="inline-block bg-yellow-400 text-gray-900 text-sm font-bold px-4 py-1 rounded-full mb-6 uppercase tracking-wide">Summer Sale Up to 50% Off</span>
            <h2 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">Discover Your <br>Perfect Style</h2>
            <p class="text-xl md:text-2xl mb-10 text-indigo-100 max-w-2xl mx-auto">Premium quality products at amazing prices. Fast delivery and secure checkout guaranteed.</p>
            <a href="/products" 
               class="inline-block bg-white text-indigo-700 px-10 py-4 rounded-full font-bold text-lg shadow-lg hover:bg-gray-100 transform hover:scale-105 transition duration-300">
                Shop Collection →
            </a>
        </div>
    </div>

    <!-- Shop by Category Section -->
    @if($categories->count() > 0)
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-3xl font-bold text-gray-800">Shop by Category</h3>
            <a href="/products" class="text-indigo-600 font-semibold hover:underline">View All →</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($categories as $category)
                <a href="/products" class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition text-center group">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-indigo-600 transition">
                        <svg class="w-8 h-8 text-indigo-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800">{{ $category->name }}</h4>
                    <p class="text-sm text-gray-500 mt-1">Explore items</p>
                </a>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Featured Products Section -->
    @if($featuredProducts->count() > 0)
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-3xl font-bold text-gray-800">Featured Products</h3>
                <a href="/products" class="text-indigo-600 font-semibold hover:underline">View All →</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredProducts as $product)
                    <div class="bg-gray-50 rounded-2xl shadow hover:shadow-xl transition overflow-hidden group">
                        <div class="relative overflow-hidden">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300x300?text=No+Image' }}" 
                                 class="w-full h-64 object-cover group-hover:scale-110 transition duration-500" alt="{{ $product->name }}">
                            @if($product->stock < 10 && $product->stock > 0)
                                <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">Low Stock</span>
                            @elseif($product->stock == 0)
                                <span class="absolute top-3 left-3 bg-gray-800 text-white text-xs font-bold px-2 py-1 rounded">Out of Stock</span>
                            @endif
                        </div>
                        <div class="p-5">
                            <p class="text-xs text-indigo-600 font-semibold uppercase mb-1">{{ $product->category->name ?? 'General' }}</p>
                            <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $product->name }}</h4>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-2xl font-bold text-indigo-600">${{ number_format($product->price, 2) }}</p>
                                <a href="/product/{{ $product->id }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Trust Badges Section (UI/UX Improvement) -->
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow">
                <svg class="w-12 h-12 text-indigo-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                </svg>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Free Shipping</h4>
                <p class="text-gray-500">On all orders over $50</p>
            </div>
            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow">
                <svg class="w-12 h-12 text-indigo-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Secure Payment</h4>
                <p class="text-gray-500">100% protected transactions</p>
            </div>
            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow">
                <svg class="w-12 h-12 text-indigo-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <h4 class="text-xl font-bold text-gray-800 mb-2">24/7 Support</h4>
                <p class="text-gray-500">Dedicated customer service</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 mt-12">
        <div class="max-w-7xl mx-auto px-6 py-12 text-center">
            <h3 class="text-2xl font-bold text-white mb-4">Zulacart</h3>
            <p class="mb-6">Your one-stop shop for premium products at amazing prices.</p>
            <div class="flex justify-center space-x-6 mb-8">
                <a href="#" class="hover:text-white">About Us</a>
                <a href="#" class="hover:text-white">Contact</a>
                <a href="#" class="hover:text-white">Privacy Policy</a>
                <a href="#" class="hover:text-white">Terms of Service</a>
            </div>
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Zulacart. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>