<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetch statistics from the database
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalCategories = Category::count();
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total_amount');

        // Send them to the view
        return view('admin.dashboard', compact(
            'totalProducts', 
            'totalOrders', 
            'totalCategories', 
            'totalRevenue'
        ));
    }
}