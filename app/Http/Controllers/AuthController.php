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
            return redirect()->back()->withErrors( 'Passwords do not match.');
        }
        
        $qry = Account::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($qry) {
            return redirect()->route('view.login');
        } else {
            return redirect()->back()->withErrors('Failed to create account. Please try again.');
        }
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $account = Account::where('email', $request->email)->first();

        if ($account && Hash::check($request->password, $account->password)) {
            session(['user_id' => $account->id]);
            return redirect()->route('store.dashboard');
        } else {
            return redirect()->back()->withErrors('Invalid email or password.');
        }
    }   

    public function logout()
    {
        session()->forget('user_id');
        return redirect()->route('view.login');
    }
}
