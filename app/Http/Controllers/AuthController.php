<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //views

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    //Posts Authentication
    public function postRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'verify_password' => 'required|min:6',
        ]);

        if ($request->password !== $request->verify_password) {
            return redirect()->back()->withErrors(['password' => 'Passwords do not match.']);
        }
        
        $qry = Account::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($qry) {
            return redirect()->route('view.login')->with('success', 'Account created successfully. Please log in.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create account. Please try again.']);
        }
    }
}
