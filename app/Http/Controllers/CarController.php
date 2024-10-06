<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    // Obtener el ID de carrito único de la sesión o crearlo si no existe
    protected function getSessionCarId()
    {
        if (!session()->has('car_id')) {
            // Generar un ID único para el carrito y almacenarlo en la sesión
            session(['car_id' => Str::uuid()]);
        }

        return session('car_id');
    }

    // Mostrar el carrito del visitante
    public function index()
    {
        // Obtener o crear el carrito utilizando el ID de la sesión
        $car = Car::with('items.product')->where('session_id', $this->getSessionCarId())->first();

        return view('car.index', compact('car'));
    }

    // Agregar un producto al carrito
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Obtener el ID de carrito de la sesión
        $sessionCarId = $this->getSessionCarId();

        // Buscar o crear un carrito con el ID de sesión
        $car = Car::firstOrCreate(['session_id' => $sessionCarId]);

        // Buscar o crear un ítem en el carrito
        $carItem = CarItem::firstOrCreate([
            'car_id' => $car->id,
            'product_id' => $request->product_id,
        ]);

        // Actualizar la cantidad
        $carItem->quantity += $request->quantity;
        $carItem->save();

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    // Actualizar la cantidad de un producto en el carrito
    public function update(Request $request, CarItem $carItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $carItem->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cantidad actualizada');
    }

    // Eliminar un producto del carrito
    public function destroy(CarItem $carItem)
    {
        $carItem->delete();

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }
}
