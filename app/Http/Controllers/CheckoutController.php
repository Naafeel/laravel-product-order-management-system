<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Show the checkout form.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        // If the cart is empty, don't let them checkout!
        if (count($cart) === 0) {
            return redirect('/cart')->with('error', 'Your cart is empty!');
        }

        // Calculate total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    /**
     * Process the order and save to database.
     */
    public function store(Request $request)
    {
        // 1. Validate the shipping details
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'phone_number' => 'required|string|max:20',
        ]);

        // 2. Get the cart
        $cart = session()->get('cart', []);
        if (count($cart) === 0) {
            return redirect('/cart')->with('error', 'Your cart is empty!');
        }

        // Calculate total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // 3. THE MAGIC TRANSACTION! 
        // If any of this fails, it rolls back automatically.
        DB::transaction(function () use ($request, $cart, $total) {
            
            // Create the main Order
            $order = Order::create([
                'user_id' => auth()->id(), // Get the ID of the currently logged-in customer! (Week 4 we will change this to the real logged-in user)
                'total_amount' => $total,
                'status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'phone_number' => $request->phone_number,
            ]);

            // Loop through the cart to create Order Items and deduct stock
            foreach ($cart as $productId => $item) {
                
                // Create the Order Item (saving the price at the time of purchase!)
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                // Deduct the stock from the actual product!
                $product = Product::find($productId);
                if ($product) {
                    $product->stock -= $item['quantity'];
                    $product->save();
                }
            }
        });

        // 4. Clear the cart session (empty the backpack!)
        session()->forget('cart');

        // 5. Redirect to a success page
        return redirect('/checkout/success')->with('success', 'Order placed successfully!');
    }

    /**
     * Show the order success page.
     */
    public function success()
    {
        return view('checkout-success');
    }
}