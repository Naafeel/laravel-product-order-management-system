<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Show the shopping cart page.
     */
    public function index()
    {
        // 1. Get the 'cart' backpack from the session. If it's empty, give an empty array.
        $cart = session()->get('cart', []);

        // 2. Calculate the total price
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // 3. Send the cart and total to the view
        return view('cart', compact('cart', 'total'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request, $productId)
    {
        // 1. Find the product in the database
        $product = Product::findOrFail($productId);

        // 2. Get the current cart from the session
        $cart = session()->get('cart', []);

        // 3. Check if the product is ALREADY in the cart
        if (isset($cart[$productId])) {
            // If yes, just increase the quantity by 1
            $cart[$productId]['quantity']++;
        } else {
            // If no, add it to the cart for the first time
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        // 4. Put the updated cart back into the session (save the backpack!)
        session()->put('cart', $cart);

        // 5. Redirect back to the product page with a success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Remove a product from the cart.
     */
    public function remove($productId)
    {
        // 1. Get the cart
        $cart = session()->get('cart', []);

        // 2. If the product exists in the cart, remove it
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        // 3. Save the updated cart back to the session
        session()->put('cart', $cart);

        // 4. Redirect back to the cart page
        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}