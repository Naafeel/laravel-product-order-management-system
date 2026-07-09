<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <!-- <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-indigo-600">Zulacart</h1>
            <div class="space-x-8">
                <a href="/" class="hover:text-indigo-600">Home</a>
                <a href="/products" class="hover:text-indigo-600">Products</a>
                <a href="/cart" class="text-indigo-600 font-semibold">Cart</a>
                <a href="/login" class="hover:text-indigo-600">Login</a>
            </div>
        </div>
    </nav> -->
    @include('partials.navbar')

    <div class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-4xl font-bold mb-8">Shopping Cart</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div id="cart-items" class="space-y-6">
            
            @if(count($cart) > 0)
                <!-- LOOP THROUGH THE CART ITEMS -->
                @foreach($cart as $id => $item)
                    <div class="bg-white p-6 rounded-2xl shadow flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : 'https://via.placeholder.com/100' }}" 
                                 alt="{{ $item['name'] }}" class="w-24 h-24 rounded-lg object-cover">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $item['name'] }}</h3>
                                <p class="text-indigo-600 font-semibold text-lg">${{ number_format($item['price'], 2) }}</p>
                                <p class="text-gray-500 text-sm mt-1">Quantity: {{ $item['quantity'] }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-6">
                            <p class="text-2xl font-bold text-gray-800">${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                            
                            <!-- REMOVE BUTTON -->
                            <form action="/cart/remove/{{ $id }}" method="GET">
                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- EMPTY CART STATE -->
                <div class="bg-white p-6 rounded-2xl shadow text-center py-16">
                    <p class="text-2xl text-gray-400 mb-4">Your cart is empty</p>
                    <a href="/products" 
                       class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-xl hover:bg-indigo-700">
                        Start Shopping
                    </a>
                </div>
            @endif

        </div>

        <!-- TOTAL AND CHECKOUT -->
        @if(count($cart) > 0)
            <div class="mt-12 bg-white p-8 rounded-2xl shadow">
                <div class="flex justify-between text-xl">
                    <span class="font-semibold">Total:</span>
                    <span class="font-bold text-3xl text-indigo-600">${{ number_format($total, 2) }}</span>
                </div>
                
                <!-- FIXED CHECKOUT LINK -->
                <a href="/checkout" class="block text-center w-full mt-8 bg-green-600 text-white py-5 rounded-2xl text-xl font-semibold hover:bg-green-700">
                    Proceed to Checkout
                </a>
            </div>
        @endif
    </div>

</body>
</html>