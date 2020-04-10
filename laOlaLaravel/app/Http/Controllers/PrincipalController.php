<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class PrincipalController extends Controller
{
  public function index()
  {
      return view('index');

  }

public function productosDestacados(){

  $products = Product::all();
//  $cantidad = ceil($products->count() / 3);
  $vars = compact('products');

  return view('index', $vars);
}






}
