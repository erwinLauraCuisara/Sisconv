<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UsuarioLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:usuario');
    }
    public function showLoginForm()
    {
        return view('auth.usuario-login');
    }   
    public function login(Request $request)
    {
        //Validar los datos del formulario;
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=>'required|min:6'

        ]);
        //Intentar registrar al usuario
        if(Auth::guard('usuario')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->remember)){
                    //Redireccionar a la ruta definida
            return redirect()->intended(route('usuario.dashboard'));
        }
        //Si no se puede redireccionar de nuevo al formulario de login
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('usuario')->logout();
        return redirect('/');
    }
}
