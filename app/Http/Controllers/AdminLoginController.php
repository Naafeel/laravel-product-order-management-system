<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminLoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Process the login
    public function login(Request $request)
    {
        // 1. Validate the form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Find the user by email
        $user = User::where('email', $request->email)->first();

        // 3. Check if user exists, password is correct, AND they are an admin
        if ($user && Hash::check($request->password, $user->password) && $user->is_admin) {
            
            // 4. Log them in!
            Auth::login($user);

            // 5. Send them to the dashboard
            return redirect('/admin/dashboard');
        }

        // If anything fails, send them back with an error
        return back()->withErrors(['email' => 'Invalid credentials or not an admin.']);
    }

    // Log out
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }
}