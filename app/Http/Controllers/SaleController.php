<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Discount;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['product', 'customer', 'discount'])->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        $discounts = Discount::all();
        return view('sales.create-or-edit', compact('products', 'customers', 'discounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'price' => 'required|numeric',
            'discount_id' => 'nullable|exists:discounts,id',
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Venta creada satisfactoriamente. ');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $products = Product::all();
        $customers = Customer::all();
        $discounts = Discount::all();
        return view('sales.create-or-edit', compact('sale', 'products', 'customers', 'discounts'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'price' => 'required|numeric',
            'discount_id' => 'nullable|exists:discounts,id',
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Venta actualizada satisfactoriamente.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Venta eliminada satisfactoriamente.');
    }
}
