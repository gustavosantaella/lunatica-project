<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("products.index", compact("products"));
    }

    public function create(){
        return view("products.create-or-edit",["product" => null]);
    }

    public function store(Request $request){
        $product = Product::create($request->all());
        return back()->with("success","Cliente creado exitosamente");
    }

    public function update(Request $request, product $product){
        $product = $product->update($request->all());
        return back()->with("success","Actualizado  exitosamente");
    }

    public function edit(Product $product){

        return view("products.create-or-edit",["product" => $product]);
    }

    public function destroy(Product $product){
    $product->delete();

    return back()->with("success","Eliminado exitosamente");
    }
}
