<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    /**
     * Show the Registration Form
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Process the Registration
     */
    public function register(Request $request)
    {
        // 1. Validate the form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // 'confirmed' means they must type it twice
        ]);

        // 2. Create the user (Hash::make encrypts the password securely!)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false, // Make sure they are NOT an admin
        ]);

        // 3. Log them in immediately after registering
        Auth::login($user);

        // 4. Redirect to their new account dashboard
        return redirect('/account')->with('success', 'Welcome to Zulacart! Your account has been created.');
    }

    /**
     * Show the Login Form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Process the Login
     */
    public function login(Request $request)
    {
        // 1. Validate the form
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Attempt to log them in (Laravel automatically checks the hashed password!)
        // We also check that they are NOT an admin (admins must use /admin/login)
        if (Auth::attempt($credentials) && !Auth::user()->is_admin) {
            
            // 3. Regenerate the session token for security (prevents hacking)
            $request->session()->regenerate();

            // 4. Redirect to their account dashboard
            return redirect()->intended('/account');
        }

        // If it fails, send them back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records, or this is an admin account.',
        ])->onlyInput('email');
    }

    /**
     * Process the Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    /**
     * Show the Customer Account Dashboard
     */
    public function account()
    {
        // Get all orders for the currently logged-in user
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        
        return view('auth.account', compact('orders'));
    }
}