<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Role;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * 
     * Redirect::intended('articles.index');
     *  Try and redirect them to where they were going, if it fails, redirect them to articles homepage
     */



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }


    /*
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended('/'); //ES PARA QUE AL INICIAR SESIÓN VUELVA ATRÁS
    }*/


    protected function authenticated(Request $request, $user)
    {
        
        if (Auth::user()->hasRole('admin')){
            //return redirect("/admin");
            return redirect("/admin");
        }

        if (Auth::user()->hasRole('user')){
            return redirect("/areaPersonal");
        }
        
        return redirect()->intended('/'); //ES PARA QUE AL INICIAR SESIÓN VUELVA ATRÁS

    }
}
