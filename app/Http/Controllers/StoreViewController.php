<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreViewController extends Controller
{
    public function dashboard()
    {
        return view('store.dashboard');
    }

    public function product()
    {
        return view('store.product');
    }
}
