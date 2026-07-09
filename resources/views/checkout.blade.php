<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <!-- <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-indigo-600">Zulacart</h1>
            <a href="/cart" class="text-gray-600 hover:text-indigo-600">← Back to Cart</a>
        </div>
    </nav> -->
    @include('partials.navbar')

    <div class="max-w-5xl mx-auto px-6 py-12">
        <h2 class="text-4xl font-bold mb-8">Checkout</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Shipping Details Form -->
            <div class="bg-white p-8 rounded-2xl shadow">
                <h3 class="text-2xl font-bold mb-6">Shipping Details</h3>
                
                <form action="/checkout" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Shipping Address</label>
                        <input type="text" name="shipping_address" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="123 Main Street, Apt 4B">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                            <input type="text" name="city" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                   placeholder="Colombo">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Postal Code</label>
                            <input type="text" name="postal_code" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                   placeholder="10000">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="text" name="phone_number" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="+94 77 123 4567">
                    </div>

                    <button type="submit" class="w-full bg-green-600 text-white py-4 rounded-xl text-xl font-semibold hover:bg-green-700 transition">
                        Place Order (${{ number_format($total, 2) }})
                    </button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="bg-white p-8 rounded-2xl shadow h-fit">
                <h3 class="text-2xl font-bold mb-6">Order Summary</h3>
                
                <div class="space-y-4 mb-6">
                    @foreach($cart as $id => $item)
                        <div class="flex justify-between items-center border-b pb-4">
                            <div>
                                <p class="font-semibold">{{ $item['name'] }}</p>
                                <p class="text-sm text-gray-500">Qty: {{ $item['quantity'] }}</p>
                            </div>
                            <p class="font-bold text-indigo-600">${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-between text-xl font-bold border-t pt-4">
                    <span>Total:</span>
                    <span class="text-indigo-600">${{ number_format($total, 2) }}</span>
                </div>
            </div>

        </div>
    </div>

</body>
</html>