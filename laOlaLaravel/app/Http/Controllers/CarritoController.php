<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cart;
use \App\User;
use Illuminate\Support\Facades\Auth;
class CarritoController extends Controller
{
  public function index(){

      return view('cart.carrito');
  }

  public function agregarAlCarrito(Request $request){

   $user =Auth::user();

   $producto = $user->carrito->where('id', $request->product_id)->first();
  //  dd($producto);

    if ($producto) {
      $cantidad = $producto->pivot->quantity + 1;
      $user->carrito()->updateExistingPivot($request->product_id,['quantity'=> $cantidad ]);
    } else {
      $user->carrito()->attach($request->product_id,['quantity'=> 1]);
    }

    if($request->isJson())
    {
      return response()->json(['exito' => true, 'cantidad' => $user->carrito->sum('quantity') ]);
    }

    return redirect('/productos');
  }


  public function miCarrito(){
    $user =Auth::user();
    $datalles=$user->carrito;
    return view('cart.carrito')
      ->with([
        'detalles' => $datalles
      ]);
  }

  public function cantidadNav(){
    $user =Auth::user();

    $datalles=$user->carrito;
    return view('partial.nav')
      ->with([
        'detalles' => $datalles
      ]);

  }

  public function sacarDelCarrito( Request $request){

    $user =Auth::user();

       $user =Auth::user();
      $producto = $user->carrito->where('id', $request->product_id)->first();
      //  dd($producto);

        if ($producto) {
       $cantidad = $producto->pivot->quantity - 1;
          $user->carrito()->updateExistingPivot($request->product_id,['quantity'=> $cantidad ]);
        } else {
    $user->carrito()->detach($request->detalle_id,['quantity'=>1]);

    return redirect('/carrito');
  }

}


}
