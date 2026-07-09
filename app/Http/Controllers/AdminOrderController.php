<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of all orders.
     */
    public function index()
    {
        // Fetch all orders, and eagerly load the 'user' and 'items' relationships
        // Order by newest first (latest orders at the top)
        $orders = Order::with(['user', 'items.product'])->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Update the status of a specific order.
     */
    public function updateStatus(Request $request, Order $order)
    {
        // 1. Validate that the status is one of the allowed options
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        // 2. Update the order status in the database
        $order->update([
            'status' => $request->status,
        ]);

        // 3. Redirect back with a success message
        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}