<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-indigo-600">Zulacart</h1>
            <div class="space-x-8">
                <a href="/" class="hover:text-indigo-600">Home</a>
                <a href="/products" class="hover:text-indigo-600">Products</a>
                <a href="/cart" class="hover:text-indigo-600">Cart</a>
                <a href="/login" class="hover:text-indigo-600">Login</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Product Image -->
            <div>
                <img src="https://picsum.photos/id/{{ $id * 10 }}/600/500" 
                     class="w-full rounded-2xl shadow" alt="Product">
            </div>

            <!-- Product Info -->
            <div>
                <h1 class="text-4xl font-bold mb-4">
                    @if($id == 1) Wireless Headphones @else Smart Watch @endif
                </h1>
                
                <p class="text-3xl font-bold text-indigo-600 mb-6">
                    @if($id == 1) $89.99 @else $149.99 @endif
                </p>

                <div class="prose mb-8">
                    <p>This is a high-quality product with excellent features. Perfect for daily use.</p>
                    <ul class="list-disc pl-5 mt-4">
                        <li>Premium build quality</li>
                        <li>Long battery life</li>
                        <li>Fast delivery</li>
                    </ul>
                </div>

                <button onclick="addToCart({{ $id }})" 
                        class="bg-indigo-600 text-white px-10 py-4 rounded-xl text-lg font-semibold hover:bg-indigo-700">
                    Add to Cart
                </button>

                <a href="/products" 
                   class="ml-4 text-gray-600 hover:text-gray-800">
                    ← Back to Products
                </a>
            </div>
        </div>
    </div>

    <script>
        function addToCart(id) {
            alert("Product " + id + " added to cart! (Cart logic coming soon)");
        }
    </script>

</body>
</html>