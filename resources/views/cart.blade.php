<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-indigo-600">Zulacart</h1>
            <div class="space-x-8">
                <a href="/" class="hover:text-indigo-600">Home</a>
                <a href="/products" class="hover:text-indigo-600">Products</a>
                <a href="/cart" class="text-indigo-600 font-semibold">Cart</a>
                <a href="/login" class="hover:text-indigo-600">Login</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-4xl font-bold mb-8">Shopping Cart</h2>

        <div id="cart-items" class="space-y-6">
            <!-- Cart items will be shown here with JavaScript later -->
            <div class="bg-white p-6 rounded-2xl shadow text-center py-16">
                <p class="text-2xl text-gray-400 mb-4">Your cart is empty</p>
                <a href="/products" 
                   class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-xl hover:bg-indigo-700">
                    Start Shopping
                </a>
            </div>
        </div>

        <div class="mt-12 bg-white p-8 rounded-2xl shadow">
            <div class="flex justify-between text-xl">
                <span class="font-semibold">Total:</span>
                <span class="font-bold text-2xl text-indigo-600">$0.00</span>
            </div>
            <button onclick="alert('Checkout page coming in Week 3!')" 
                    class="w-full mt-8 bg-green-600 text-white py-5 rounded-2xl text-xl font-semibold hover:bg-green-700">
                Proceed to Checkout
            </button>
        </div>
    </div>

</body>
</html>