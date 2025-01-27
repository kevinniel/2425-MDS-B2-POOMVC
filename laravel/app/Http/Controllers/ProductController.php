<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all();

        return view('products.index', [
            'products' => $products
        ]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $product = Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function edit($id) {
        return view('products.edit', [
            'product' => Product::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $product->name = $request->get('name');
        $product->price = $request->get('price');

        $product->save();

        return redirect()->route('products.index');
    }

    public function destroy(Request $request) {
        Product::findOrFail($request->get('product_id'))->delete();
        
        return redirect()->route('products.index');
    }
}
