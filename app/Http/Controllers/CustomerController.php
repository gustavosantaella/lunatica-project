<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view("customers.index", compact("customers"));
    }

    public function create(){
        return view("customers.create-or-edit",["customer" => null]);
    }

    public function store(Request $request){
        $customer = Customer::create($request->all());
        return back()->with("success","Cliente creado exitosamente");
    }

    public function update(Request $request, Customer $customer){
        $customer = $customer->update($request->all());
        return back()->with("success","Actualizado  exitosamente");
    }

    public function edit(Customer $customer){

        return view("customers.create-or-edit",["customer" => $customer]);
    }

    public function destroy(Customer $customer){
    $customer->delete();

    return back()->with("success","Eliminado exitosamente");
    }
}
