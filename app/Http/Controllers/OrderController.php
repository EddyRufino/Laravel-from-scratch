<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{

    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    public function create()
    {
        $cart = $this->cartService->getFromCookie();

        if (!isset($cart) || $cart->products->isEmpty()) {
            return redirect()
                    ->back()
                    ->withErrors('Your cart is empty');
        }

        return view('orders.create', compact('cart'));
    }

    public function store(Request $request)
    {
        return DB::transaction(function() use($request) {
            $user = $request->user();

            $order = $user->orders()->create([
                'status' => 'pending',
                ]);
                
            $cart = $this->cartService->getFromCookie();
                
            $cartProductsWithQantity = $cart
                ->products
                ->mapWithKeys( function ($product) {
                    $quantity = $product->pivot->quantity;

                    if ($product->stock < $quantity) {
                        throw ValidationException::withMessages([
                            'cart' => "There is not enough stock for the quantity you required of {$product->title}",
                        ]);
                    }

                    $product->decrement('stock', $quantity);
                    $element[$product->id] = ['quantity' => $quantity];

                    return $element;
            });
                
            // dd($cartProductsWithQantity);
            $order->products()->attach($cartProductsWithQantity->toArray());

            return redirect()->route('orders.payments.create', compact('order'));
        }, 5);
    }
}
