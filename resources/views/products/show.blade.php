<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-indigo-600">Zulacart</h1>
            <div class="space-x-8">
                <a href="/" class="hover:text-indigo-600">Home</a>
                <a href="/products" class="hover:text-indigo-600">Products</a>
                <a href="/cart" class="hover:text-indigo-600 font-semibold">Cart</a>
                <a href="/login" class="hover:text-indigo-600">Login</a>
            </div>
        </div>
    </nav>

    <!-- Success Message -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-6 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-lg">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Product Image -->
            <div>
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/600x500?text=No+Image' }}" 
                     class="w-full rounded-2xl shadow" alt="{{ $product->name }}">
            </div>

            <!-- Product Info -->
            <div>
                <h1 class="text-4xl font-bold mb-4">{{ $product->name }}</h1>
                
                <p class="text-3xl font-bold text-indigo-600 mb-6">${{ number_format($product->price, 2) }}</p>

                <div class="prose mb-8">
                    <p>{{ $product->description ?? 'No description available for this product.' }}</p>
                    <ul class="list-disc pl-5 mt-4 text-gray-600">
                        <li>Stock Available: <strong>{{ $product->stock }}</strong></li>
                        <li>Category: <strong>{{ $product->category ? $product->category->name : 'Uncategorized' }}</strong></li>
                        <li>Fast delivery</li>
                    </ul>
                </div>

                <!-- THE REAL ADD TO CART FORM -->
                @if($product->stock > 0)
                    <form action="/cart/add/{{ $product->id }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" 
                                class="bg-indigo-600 text-white px-10 py-4 rounded-xl text-lg font-semibold hover:bg-indigo-700">
                            Add to Cart
                        </button>
                    </form>
                @else
                    <button disabled class="bg-gray-400 text-white px-10 py-4 rounded-xl text-lg font-semibold cursor-not-allowed">
                        Out of Stock
                    </button>
                @endif

                <a href="/products" 
                   class="ml-4 text-gray-600 hover:text-gray-800">
                    ← Back to Products
                </a>
            </div>
        </div>
    </div>

</body>
</html>