<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders - Zulacart Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Admin Header -->
    <!-- <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">Zulacart Admin</h1>
            <div class="flex items-center gap-6">
                <a href="/admin/dashboard" class="text-gray-600 hover:text-indigo-600">Dashboard</a>
                <a href="/admin/products" class="text-gray-600 hover:text-indigo-600">Products</a>
                <a href="/admin/categories" class="text-gray-600 hover:text-indigo-600">Categories</a>
                <a href="/admin/orders" class="text-indigo-600 font-semibold">Orders</a>
                <a href="/" class="text-gray-600 hover:text-indigo-600">View Website</a>
                
                <form action="/admin/logout" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Logout</button>
                </form>
            </div>
        </div>
    </nav> -->
    @include('partials.admin-navbar')

    <div class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Manage Orders</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Items</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Current Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Update Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    @forelse($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $order->id }}</td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $order->user ? $order->user->name : 'Guest' }}<br>
                                <span class="text-xs text-gray-400">{{ $order->shipping_address }}</span>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                @foreach($order->items as $item)
                                    <div class="text-xs">
                                        {{ $item->product->name ?? 'Deleted Product' }} (x{{ $item->quantity }})
                                    </div>
                                @endforeach
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-indigo-600">
                                ${{ number_format($order->total_amount, 2) }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $order->created_at->format('M d, Y') }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($order->status == 'pending')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                @elseif($order->status == 'processing')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Processing</span>
                                @elseif($order->status == 'shipped')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Shipped</span>
                                @elseif($order->status == 'delivered')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
                                @elseif($order->status == 'cancelled')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <!-- Update Status Form -->
                                <form action="/admin/orders/{{ $order->id }}/status" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="border-gray-300 rounded-md text-sm py-1 px-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    <button type="submit" class="bg-indigo-600 text-white px-3 py-1 rounded-md text-xs hover:bg-indigo-700">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                No orders found yet.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</body>
</html>