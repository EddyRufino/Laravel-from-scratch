<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
    	// \DB::connection()->enableQueryLog();
    	
        return view('welcome', [
            'products' => Product::latest()->get()
        ]);
    }
}
