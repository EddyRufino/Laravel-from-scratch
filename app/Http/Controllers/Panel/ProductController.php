<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Scopes\AvailableScope;
use Illuminate\Http\Request;
use App\PanelProduct;

class ProductController extends Controller
{
    public function index()
    {
        $products = PanelProduct::withOut('images')->latest()->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create', [
            'product' => new PanelProduct,
        ]);
    }

    public function store(ProductRequest $request)
    {

        /**
         * if ($request->status == 'available' && $request->stock == 0) {
         * flash() crea la session y la elimina cuando recargas la página
         * session()->flash('error', 'If available must have stock');
         * Pero con withErrors se puede pasar el valor a la variable global $errors
         * return redirect()
         *        ->back()
         *        ->withInput($request->all())
         *        ->withErrors('If available must have stock'); 
         * 
         */

        $product = PanelProduct::Create($request->validated());

        return redirect()
                ->route('products.index')
                ->with('flash', "The product {$product->title} was created");
    }

    public function show(PanelProduct $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(PanelProduct $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, PanelProduct $product)
    {

        $product->update($request->validated());

        return redirect()
                ->route('products.index')
                ->with('flash', "The product {$product->title} was updated");
    }

    public function destroy(PanelProduct $product)
    {
        $product->delete();

        return redirect()
                ->route('products.index')
                ->with('flash', "The product {$product->title} was deleted");
    }
}
