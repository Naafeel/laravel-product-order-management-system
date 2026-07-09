<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    @include('partials.navbar')

    <div class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">My Account</h2>
        <p class="text-gray-600 mb-8">Welcome back, <strong>{{ auth()->user()->name }}</strong>!</p>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <h3 class="text-2xl font-bold text-gray-800 mb-4">My Orders</h3>

        @if($orders->count() > 0)
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($orders as $order)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $order->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-indigo-600">${{ number_format($order->total_amount, 2) }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                        @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                                        @elseif($order->status == 'delivered') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white p-8 rounded-xl shadow text-center">
                <p class="text-gray-500 text-lg mb-4">You haven't placed any orders yet.</p>
                <a href="/products" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">Start Shopping</a>
            </div>
        @endif
    </div>

</body>
</html>