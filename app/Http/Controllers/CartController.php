<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cart = $this->cartService->getFromCookie();

        return view('carts.index', compact('cart'));
    }
}
