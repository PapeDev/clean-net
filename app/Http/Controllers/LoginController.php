<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|min:3',
            'password' => 'required|min:4'
        ]);
        //dd(Auth::attempt(['login' => $request->login, 'password' => $request->password]));

        if(Auth::attempt(['login' => $request->login, 'password' => $request->password]))
        {
            if(Auth::user()->numberConnexion == 0)
            {
                Session::flash('info', 'Vous devez mettre à jour vos informations et changer votre mot de passe');
            }
            else
            {
                Session::flash('success', 'Connexion réussie !');
            }
            //
            return redirect()->route('dashboard_Admin');
        }
        Session::flash('warning', 'Login / mot de passe incorrect !');
        return redirect()->back();
    }


    public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
