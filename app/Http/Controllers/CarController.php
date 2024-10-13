<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Mostrar el carrito del visitante
    public function index()
    {

        $car = session()->get('car', []);

        return view('car.index', compact('car'));
    }

    // Agregar un producto al carrito
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $car = session()->get('car', []);

        if (isset($car[$product->id])) {
            $car[$product->id]['quantity'] += $request->quantity;
        } else {

            $car[$product->id] = [
                'nombre' => $product->nombre,
                'precio' => $product->precio,
                'quantity' => $request->quantity
            ];
        }


        session()->put('car', $car);

        return redirect()->back()->with('message', ['type' => 'success', 'title' => 'Carrito', 'text' => 'Producto agregado al carrito']);
    }


    // Actualizar la cantidad de un producto en el carrito
    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Obtener el carrito de la sesión
        $car = session()->get('car', []);

        if (isset($car[$productId])) {
            // Actualizamos la cantidad del producto
            $car[$productId]['quantity'] = $request->quantity;
            session()->put('car', $car);

            return redirect()->back()->with('message', ['type' => 'success', 'title' => 'Carrito', 'text' => 'Cantidad actualizada']);
        }

        return redirect()->back()->with('message', ['type' => 'error', 'title' => 'Carrito', 'text' => 'Producto no encontrado en el carrito']);
    }

    // Eliminar un producto del carrito
    public function destroy($productId)
    {
        // Obtener el carrito de la sesión
        $car = session()->get('car', []);

        if (isset($car[$productId])) {
            // Eliminar el producto del carrito
            unset($car[$productId]);

            // Guardar el carrito actualizado en la sesión
            session()->put('car', $car);

            return redirect()->back()->with('message', ['type' => 'success', 'title' => 'Carrito', 'text' => 'Producto eliminado del carrito']);
        }

        return redirect()->back()->with('message', ['type' => 'error', 'title' => 'Carrito', 'text' => 'Producto no encontrado en el carrito']);
    }
}
