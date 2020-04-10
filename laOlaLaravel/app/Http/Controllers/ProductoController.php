<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Cart;

class ProductoController extends Controller
{
    public function detalle($id)
    {
      $products = Product::find($id);
      return view('product.detalles')->with( [ 'caca' => $products] );
    }

    // buscador
    public function index()
    {
      if (isset($_GET['name']))
      {
        $products = Product::where('name', 'LIKE', '%'.$_GET['name'].'%')->paginate(3);
      } else
        {
          $products = Product::paginate(3);
        }
          return view('product.products')->with( [ 'products' => $products] );
    }


  public function borrarProducto($id)
  {
    $productoBorrar = Product::find($id);
    return view('product.delete')
    ->with([
    'products' => $productoBorrar
    ]);
  }

    public function borrar(Request $request)

    {
        $id = $request['id'];

        $carritos = Cart::where('product_id', '=', $id);
        $carritos->delete();

        $product = Product::find($id);
        $product->delete();

        if ($request->isJson()) {
          return response()->json(['mensaje' => 'que seas muy feliz']);
        }
      return redirect('/productos')->with('mensaje', 'Borrado de Producto exitoso!');
    }




//
    public function createProduct()
    {
        return view('product.create');
    }

    public function save(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',

            'avatar' => 'required|image',
            'avatar1' => 'required|image',
            'avatar2' => 'required|image',
            'avatar3' => 'required|image',
            'avatar4' => 'required|image',
        ],
        [
            'name.required' => 'El nombre es obligatorio',
            'description.required' => 'La descripción es obligatorio',
            'price.required' => 'El precio es obligatorio',

            'image' => 'Imagen invalida',
        ]);

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),

        ]);


          //al archivo que subi lo voy a guardar en el filesystem de laravel
          $rutaDelArchivo = $request->file('avatar')->store('public');
          //le saco solo el nombre
          $nombreArchivo = basename($rutaDelArchivo);
          //guardo el nombre del archivo en el campo poster
          $product->avatar = $nombreArchivo;

          //al archivo que subi lo voy a guardar en el filesystem de laravel
          $rutaDelArchivo = $request->file('avatar1')->store('public');
          //le saco solo el nombre
          $nombreArchivo = basename($rutaDelArchivo);
          //guardo el nombre del archivo en el campo poster
          $product->avatar1 = $nombreArchivo;

          //al archivo que subi lo voy a guardar en el filesystem de laravel
          $rutaDelArchivo = $request->file('avatar2')->store('public');
          //le saco solo el nombre
          $nombreArchivo = basename($rutaDelArchivo);
          //guardo el nombre del archivo en el campo poster
          $product->avatar2 = $nombreArchivo;

          //al archivo que subi lo voy a guardar en el filesystem de laravel
          $rutaDelArchivo = $request->file('avatar3')->store('public');
          //le saco solo el nombre
          $nombreArchivo = basename($rutaDelArchivo);
          //guardo el nombre del archivo en el campo poster
          $product->avatar3 = $nombreArchivo;

          //al archivo que subi lo voy a guardar en el filesystem de laravel
          $rutaDelArchivo = $request->file('avatar4')->store('public');
          //le saco solo el nombre
          $nombreArchivo = basename($rutaDelArchivo);
          //guardo el nombre del archivo en el campo poster
          $product->avatar4 = $nombreArchivo;

          $product->save();
          if($request->isJson()){
              return response()->json(['products' => $products]);
          }
          return redirect('/productos')->with('mensaje', 'Producto Guardado exitosamente!');
  }



    public function edit($id)
    {
        $productoEditado = Product::find($id);
        return view('product.edit')
        ->with([
        'producto' => $productoEditado
      ]);
    }

    public function update($id, Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',

            'avatar' => 'required|image',
            'avatar1' => 'required|image',
            'avatar2' => 'required|image',
            'avatar3' => 'required|image',
            'avatar4' => 'required|image',
          ],
          [
            'name.required' => 'El nombre es obligatorio',
            'description.required' => 'La descripción es obligatorio',
            'price.required' => 'El precio es obligatorio',

            'image' => 'avatarImagen invalida',
          ]);

          //me traigo a la producto usando el find
          $productoAEditar = Product::find($id);
          //le cambio los atributos o valores al objeto que me traje arriba
          $productoAEditar->name = $request->name;
          $productoAEditar->description = $request->description;
          $productoAEditar->price = $request->price;


          //si subo un archivo, lo guardo.
          if($request->file('avatar')){
            //al archivo que subi lo voy a guardar en el filesystem de laravel
            $rutaDelArchivo = $request->file('avatar')->store('public');
            //le saco solo el nombre
            $nombreArchivo = basename($rutaDelArchivo);
            //guardo el nombre del archivo en el campo avatar
            $productoAEditar->avatar = $nombreArchivo;
          }



          if($request->file('avatar1')){
            //al archivo que subi lo voy a guardar en el filesystem de laravel
            $rutaDelArchivo = $request->file('avatar1')->store('public');
            //le saco solo el nombre
            $nombreArchivo = basename($rutaDelArchivo);
            //guardo el nombre del archivo en el campo avatar
            $productoAEditar->avatar1 = $nombreArchivo;
          }
          if($request->file('avatar2')){
            //al archivo que subi lo voy a guardar en el filesystem de laravel
            $rutaDelArchivo = $request->file('avatar2')->store('public');
            //le saco solo el nombre
            $nombreArchivo = basename($rutaDelArchivo);
            //guardo el nombre del archivo en el campo avatar
            $productoAEditar->avatar2 = $nombreArchivo;
          }
          if($request->file('avatar3')){
            //al archivo que subi lo voy a guardar en el filesystem de laravel
            $rutaDelArchivo = $request->file('avatar3')->store('public');
            //le saco solo el nombre
            $nombreArchivo = basename($rutaDelArchivo);
            //guardo el nombre del archivo en el campo avatar
            $productoAEditar->avatar3 = $nombreArchivo;
          }

          if($request->file('avatar4')){
            //al archivo que subi lo voy a guardar en el filesystem de laravel
            $rutaDelArchivo = $request->file('avatar4')->store('public');
            //le saco solo el nombre
            $nombreArchivo = basename($rutaDelArchivo);
            //guardo el nombre del archivo en el campo avatar
            $productoAEditar->avatar4 = $nombreArchivo;
          }
          //lo mando a guardar
          $productoAEditar->save();
          return redirect('/productos');
        }

}
