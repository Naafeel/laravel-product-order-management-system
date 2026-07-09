<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Zulacart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 ml-64">

    @include('partials.admin-navbar')

    <main class="p-8">
        <div class="max-w-7xl mx-auto">
            
            <!-- Page Header -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Dashboard Overview</h2>
                <p class="text-gray-600 mt-2">Welcome back, Admin! Here's what's happening with your store today.</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-green-500">
                    <p class="text-gray-500 text-sm uppercase font-semibold">Total Revenue</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">${{ number_format($totalRevenue, 2) }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-blue-500">
                    <p class="text-gray-500 text-sm uppercase font-semibold">Total Orders</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalOrders }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-indigo-500">
                    <p class="text-gray-500 text-sm uppercase font-semibold">Total Products</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalProducts }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-purple-500">
                    <p class="text-gray-500 text-sm uppercase font-semibold">Total Categories</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalCategories }}</p>
                </div>
            </div>

            <!-- CHART 1: Sales Over Last 7 Days -->
            <div class="bg-white p-6 rounded-xl shadow mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Sales Performance (Last 7 Days)</h3>
                <canvas id="salesChart" height="80"></canvas>
            </div>

            <!-- Row 1: Two Charts Side by Side -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                
                <!-- CHART 2: Order Status Distribution -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Order Status Distribution</h3>
                    <canvas id="orderStatusChart"></canvas>
                </div>

                <!-- CHART 3: Top Selling Products -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Top 5 Best Selling Products</h3>
                    <canvas id="topProductsChart"></canvas>
                </div>

            </div>

            <!-- Row 2: Two More Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                
                <!-- CHART 4: Products by Category -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Products by Category</h3>
                    <canvas id="categoryChart"></canvas>
                </div>

                <!-- CHART 5: Daily Orders (Last 30 Days) -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Daily Orders (Last 30 Days)</h3>
                    <canvas id="dailyOrdersChart" height="100"></canvas>
                </div>

            </div>

            <!-- Row 3: Revenue Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                
                <!-- CHART 6: Revenue by Category -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Revenue by Category</h3>
                    <canvas id="revenueCategoryChart"></canvas>
                </div>

                <!-- CHART 7: Monthly Revenue Comparison -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Monthly Revenue (Last 6 Months)</h3>
                    <canvas id="monthlyRevenueChart"></canvas>
                </div>

            </div>

            <!-- CHART 8: Low Stock Alert -->
            <div class="bg-white p-6 rounded-xl shadow mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Low Stock Alert</h3>
                @if($outOfStockProducts > 0)
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <strong>{{ $outOfStockProducts }}</strong> product(s) are completely out of stock!
                    </div>
                @endif

                @if($lowStockProducts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($lowStockProducts as $product)
                            <div class="border-l-4 border-yellow-500 bg-yellow-50 p-4 rounded">
                                <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                                <p class="text-sm text-gray-600">Only <strong class="text-red-600">{{ $product->stock }}</strong> left in stock</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">All products have sufficient stock!</p>
                @endif
            </div>

            <!-- Recent Orders Table -->
            <div class="bg-white rounded-xl shadow overflow-hidden mb-8">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-bold text-gray-800">Recent Orders</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($recentOrders as $order)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $order->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $order->user->name ?? 'Guest' }}</td>
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
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">No orders yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <!-- Chart.js Scripts -->
    <script>
        // CHART 1: Sales Over Last 7 Days (Line Chart)
        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: @json($salesLabels),
                datasets: [{
                    label: 'Revenue ($)',
                    data: @json($salesData),
                    borderColor: 'rgb(99, 102, 241)',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });

        // CHART 2: Order Status Distribution (Doughnut Chart)
        new Chart(document.getElementById('orderStatusChart'), {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'],
                datasets: [{
                    data: @json($orderStatusData),
                    backgroundColor: [
                        'rgb(251, 191, 36)',
                        'rgb(59, 130, 246)',
                        'rgb(168, 85, 247)',
                        'rgb(34, 197, 94)',
                        'rgb(239, 68, 68)'
                    ]
                }]
            },
            options: { responsive: true }
        });

        // CHART 3: Top Selling Products (Bar Chart)
        new Chart(document.getElementById('topProductsChart'), {
            type: 'bar',
            data: {
                labels: @json($topProductLabels),
                datasets: [{
                    label: 'Units Sold',
                    data: @json($topProductData),
                    backgroundColor: 'rgb(99, 102, 241)'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });

        // CHART 4: Products by Category (Pie Chart)
        new Chart(document.getElementById('categoryChart'), {
            type: 'pie',
            data: {
                labels: @json($categoryLabels),
                datasets: [{
                    data: @json($categoryProductCounts),
                    backgroundColor: [
                        'rgb(99, 102, 241)',
                        'rgb(168, 85, 247)',
                        'rgb(236, 72, 153)',
                        'rgb(251, 146, 60)',
                        'rgb(34, 197, 94)',
                        'rgb(59, 130, 246)'
                    ]
                }]
            },
            options: { responsive: true }
        });

        // CHART 5: Daily Orders (Area Chart)
        new Chart(document.getElementById('dailyOrdersChart'), {
            type: 'line',
            data: {
                labels: @json($ordersLabels),
                datasets: [{
                    label: 'Orders',
                    data: @json($ordersData),
                    borderColor: 'rgb(34, 197, 94)',
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });

        // CHART 6: Revenue by Category (Horizontal Bar)
        new Chart(document.getElementById('revenueCategoryChart'), {
            type: 'bar',
            data: {
                labels: @json($revenueCategoryLabels),
                datasets: [{
                    label: 'Revenue ($)',
                    data: @json($revenueCategoryData),
                    backgroundColor: 'rgb(168, 85, 247)'
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });

        // CHART 7: Monthly Revenue (Bar Chart)
        new Chart(document.getElementById('monthlyRevenueChart'), {
            type: 'bar',
            data: {
                labels: @json($monthlyLabels),
                datasets: [{
                    label: 'Revenue ($)',
                    data: @json($monthlyData),
                    backgroundColor: 'rgb(59, 130, 246)'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });
    </script>

</body>
</html>