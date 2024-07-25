<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
public function index(){

    $products = [];
    return view("shop.cart.index", compact("products"));
}
}
