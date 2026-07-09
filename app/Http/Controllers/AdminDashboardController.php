<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Basic Statistics
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalCategories = Category::count();
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total_amount');

        // ============================================
        // CHART 1: Sales Over Last 7 Days (Line Chart)
        // ============================================
        $salesData = [];
        $salesLabels = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $salesLabels[] = Carbon::now()->subDays($i)->format('M d');
            $salesData[] = Order::where('status', '!=', 'cancelled')
                ->whereDate('created_at', $date)
                ->sum('total_amount');
        }

        // ============================================
        // CHART 2: Order Status Distribution (Doughnut Chart)
        // ============================================
        $orderStatusData = [
            Order::where('status', 'pending')->count(),
            Order::where('status', 'processing')->count(),
            Order::where('status', 'shipped')->count(),
            Order::where('status', 'delivered')->count(),
            Order::where('status', 'cancelled')->count(),
        ];

        // ============================================
        // CHART 3: Top 5 Selling Products (Bar Chart)
        // ============================================
        $topProducts = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->with('product')
            ->get();
        
        $topProductLabels = $topProducts->pluck('product.name')->toArray();
        $topProductData = $topProducts->pluck('total_sold')->toArray();

        // ============================================
        // CHART 4: Products by Category (Pie Chart)
        // ============================================
        $categoryData = Category::withCount('products')->get();
        $categoryLabels = $categoryData->pluck('name')->toArray();
        $categoryProductCounts = $categoryData->pluck('products_count')->toArray();

        // ============================================
        // CHART 5: Daily Orders Last 30 Days (Area Chart)
        // ============================================
        $ordersData = [];
        $ordersLabels = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $ordersLabels[] = Carbon::now()->subDays($i)->format('M d');
            $ordersData[] = Order::whereDate('created_at', $date)->count();
        }

        // ============================================
        // CHART 6: Revenue by Category (Horizontal Bar Chart)
        // ============================================
        $revenueByCategory = Category::select('categories.name', DB::raw('SUM(order_items.price * order_items.quantity) as revenue'))
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('categories.id', 'categories.name')
            ->get();
        
        $revenueCategoryLabels = $revenueByCategory->pluck('name')->toArray();
        $revenueCategoryData = $revenueByCategory->pluck('revenue')->map(function($value) {
            return round($value, 2);
        })->toArray();

        // ============================================
        // CHART 7: Monthly Revenue Comparison (Bar Chart)
        // ============================================
        $monthlyData = [];
        $monthlyLabels = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthlyLabels[] = $month->format('M Y');
            $monthlyData[] = Order::where('status', '!=', 'cancelled')
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->sum('total_amount');
        }

        // ============================================
        // CHART 8: Low Stock Products (Visual Alert List)
        // ============================================
        $lowStockProducts = Product::where('stock', '<', 10)
            ->where('stock', '>', 0)
            ->orderBy('stock')
            ->limit(5)
            ->get();

        $outOfStockProducts = Product::where('stock', 0)->count();

        // Recent Orders for the table
        $recentOrders = Order::with(['user', 'items.product'])->latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalProducts', 
            'totalOrders', 
            'totalCategories', 
            'totalRevenue',
            'salesLabels',
            'salesData',
            'orderStatusData',
            'topProductLabels',
            'topProductData',
            'categoryLabels',
            'categoryProductCounts',
            'ordersLabels',
            'ordersData',
            'revenueCategoryLabels',
            'revenueCategoryData',
            'monthlyLabels',
            'monthlyData',
            'lowStockProducts',
            'outOfStockProducts',
            'recentOrders'
        ));
    }
}