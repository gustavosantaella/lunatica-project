<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Mostrar el carrito del cliente
    public function index()
    {

        $car = Car::with('items.product')->where('customer_id', auth()->id())->first();

        return view('car.index', compact('car'));
    }

    // Agregar un producto al carrito
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $car = Car::firstOrCreate(['customer_id' => auth()->id()]);

        $carItem = CarItem::firstOrCreate([
            'car_id' => $car->id,
            'product_id' => $request->product_id
        ]);

        $carItem->quantity += $request->quantity;
        $carItem->save();

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }


    public function update(Request $request, CarItem $carItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $carItem->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cantidad actualizada');
    }


    public function destroy(CarItem $carItem)
    {
        $carItem->delete();

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }
}
