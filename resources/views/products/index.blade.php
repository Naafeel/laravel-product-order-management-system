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
            
            <!-- Sample Product 1 -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                <img src="https://picsum.photos/id/20/300/200" 
                     class="w-full h-48 object-cover rounded-t-xl" alt="Product">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">Wireless Headphones</h3>
                    <p class="text-gray-600 text-sm">Premium sound quality</p>
                    <p class="text-2xl font-bold text-indigo-600 mt-2">$89.99</p>
                    <a href="/product/1" 
                       class="block text-center bg-indigo-600 text-white py-2 mt-4 rounded-lg hover:bg-indigo-700">
                        View Details
                    </a>
                </div>
            </div>

            <!-- Sample Product 2 -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                <img src="https://picsum.photos/id/60/300/200" 
                     class="w-full h-48 object-cover rounded-t-xl" alt="Product">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">Smart Watch</h3>
                    <p class="text-gray-600 text-sm">Fitness & Notifications</p>
                    <p class="text-2xl font-bold text-indigo-600 mt-2">$149.99</p>
                    <a href="/product/2" 
                       class="block text-center bg-indigo-600 text-white py-2 mt-4 rounded-lg hover:bg-indigo-700">
                        View Details
                    </a>
                </div>
            </div>

            <!-- Add more products like this later -->
        </div>
    </div>

</body>
</html>