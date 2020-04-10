<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image_profile' => ['nullable', 'file', 'image']
        ],
        [
            'required' => 'Campo obligatorio',
            'max' => 'El nombre debe contener entre 3 y 30 carácteres',
            'name.min' => 'El nombre debe contener entre 3 y 30 carácteres',
            'unique' => 'E-mail ya registrado',
            'email' => 'Formato de E-mail inválido',
            'password.min' => 'La contraseña debe tener por lo menos 8 carácteres',
            'image' => 'Formato de imagen inválido',
        ]

    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $nombreDeArchivo = 'avatar.png';

        $request = request();
        if ($request->hasFile('image_profile')) {
            $path = $request->file('image_profile')->store('public/images');
            $nombreDeArchivo = basename($path);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image_profile' => $nombreDeArchivo
        ]);
    }
}
