<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UsuarioLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:usuario')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.usuarioLogin');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        if(Auth::guard('usuario')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('usuario.home'));
        }
       /* $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);*/
        return redirect()->back()->withInput($request->only('remember','email'));
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
    protected function guard()
    {
        return Auth::guard();
    }
}
