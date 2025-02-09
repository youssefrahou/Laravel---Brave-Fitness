<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ValidarRegistroRequest;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = "/";

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

        /*
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        */
    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    

    public function register(ValidarRegistroRequest $request)
    {
        $user = User::create([

            'name' => $request['name'],
            'apellido1' => $request['apellido1'],
            'apellido2' => $request['apellido2'],
            'objetivo' => $request['objetivo'],
            'sexo' => $request['sexo'],
            'peso' => $request['peso'],
            'altura' => $request['altura'],
            'fechaNacimiento' => $request['fechaNacimiento'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            
        ]);

        $user->roles()->attach(Role::where('nombre', 'user')->first());
        Auth::login($user);
        //return $this->registered($request, $user) ?: redirect($this->redirectPath());

        if ($user->hasRole('user')){
            return redirect("areaPersonal");
        }else{
            return redirect("admin");
        }
    }


    public function showRegistrationForm()
    {
        return view('auth.registro');
    }
}
