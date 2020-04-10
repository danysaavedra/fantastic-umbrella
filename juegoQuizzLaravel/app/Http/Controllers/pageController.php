<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Mail\contactoMail;
use Illuminate\Http\Request;
use App\Logro;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class pageController extends Controller
{


    public function contacto()
    {
        return view('contacto');
    }

    public function sendMail(Request $request)
    {
        $validated = $request->validate(
            [
                'asunto' => ['required', 'min:1'],
                'consulta' => ['required', 'min:1']
            ]
        );

        \Mail::to('gonzalo.zev@gmail.com')->send(
            new contactoMail($validated)
        );
          return back()->with('message', '¡Consulta enviada!');
    }

    public function faqs()
    {
        return view('faqs');
    }
    public function top()
    {
        $info = DB::table('logros')->select('user_id', DB::raw("SUM(puntaje) as puntos"))->orderBy('puntos', 'desc')->groupBy('user_id')->take(10)->get();
        $collection = $info->map(function ($x) {
            $user = User::find($x->user_id);
            return $x = [
                'Usuario' => $user->name,
                'Puntos' => $x->puntos
            ];
        });
        $new = collect($collection);
        return view('top', compact('new'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function update(Request $request)
    {

        $user = Auth::user();

        $validated = $request->validate(
            [
                'name' => ['required', 'min:3', 'max:25'],
                'email' => ['required', 'email'],
                'image_profile' => ['nullable', 'file', 'image']
            ],
            [
                'required' => 'Campo obligatorio',
                'min' => 'El nombre debe tener entre 3 y 25 carácteres',
                'max' => 'El nombre debe tener entre 3 y 25 carácteres',
                'image' => 'Formato de imagen inválido',
                'email' => 'Formato de E-mail inválido'
            ]
        );

        if ($request->hasFile('image_profile')) {
            if ($user->image_profile != 'avatar.png') {
                $path = 'public/images/' . $user->image_profile;
                Storage::delete($path);
            }
            

            $path = $request->file('image_profile')->store('public/images');
            $nombreArchivo = basename($path);

            $user->update(
                [
                    'name' => request('name'),
                    'email' => request('email'),
                    'image_profile' => $nombreArchivo
                ]
            );
        }
        $user->update(
            [
                'name' => request('name'),
                'email' => request('email')
            ]
        );

        return back()->with('message', 'Cambios realizados con exito');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }

    public function admin(Request $request){

        abort_if(auth()->guest() || auth()->user()->admin == 0, 403);
        if(isset($request->email)){
            $user = User::where('email', 'LIKE', $request->email)->first();
            if($user == null){
                $user = '';
            }
        }

        $vac = compact('user');
        // dd($user);
        return view('admin', $vac);

    }

    public function converter($id){

        // abort_if(auth()->guest() || auth()->user()->admin == 0, 403);

        $user = User::find($id);
        if ($user->admin == 0) {
          $user->admin = 1;
        } else if ($user->admin == 1) {
          $user->admin = 0;
        }


        $user->save();

        return back()->with('message', 'Cambios realizados con exito');
    }

    public function eliminar($id){

        $user = User::find($id);
        $user->delete();

        return back()->with('message', 'Usuario eliminado');
    }
}
