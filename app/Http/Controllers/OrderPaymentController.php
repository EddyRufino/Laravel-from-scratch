<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderPaymentController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }
 
    public function create(Order $order)
    {
        return view('payments.create', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        return DB::transaction(function() use($order) {
            //PaymentService::handlePayment();

            $this->cartService->getFromCookie()->products()->detach();

            $order->payment()->create([
                'amount' => $order->total,
                'payed_at' => now(),
            ]);

            $order->status = 'payed';
            $order->save();

            return redirect()
                ->route('main')
                ->with('flash', "Thanks! Your payment for \${$order->total} was successful.");
        }, 5);
    }
}
