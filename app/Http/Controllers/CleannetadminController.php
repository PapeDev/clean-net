<?php

namespace App\Http\Controllers;

use App\Mail\SocieteMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class CleannetadminController extends Controller
{
    public function getIndex()
    {
        return view('cleannetAdmin.login');
    }

    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|min:3',
            'password' => 'required|min:4'
        ]);
        //dd(Auth::attempt(['login' => $request->login, 'password' => $request->password]));

        if(Auth::attempt(['login' => $request->login, 'password' => $request->password]))
        {
            Session::flash('success', 'Connexion réussie !');
            return redirect()->route('dashboard_cleannet');
        }
        Session::flash('warning', 'Login / mot de passe incorrect !');
        return redirect()->back();
    }

    public function getDashboard()
    {
        return view('cleannetAdmin.dashboardcleannet');
    }

    public function getList()
    {
        $users = DB::table('users')
            ->select(DB::raw('*'))
            ->get();
        return view('cleannetAdmin.listsocietes', compact('users'));
    }

    public function create()
    {
        return view('cleannetAdmin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'nomSociete' => 'required|min:2|max:255',
            'login' => 'required|min:2|max:255',
            'email' => 'required|email|min:9',
        ));

        $user = new User();
        $user->nomSociete = $request->nomSociete;
        $user->login = $request->login;
        $user->email = $request->email;

        $mot_de_passe = rand(123456, 1123456);
        //echo $mot_de_passe.'<br>';
        $user->fill([
            'password' => Hash::make($mot_de_passe)
        ]);
        $userid = DB::table('users')
            ->orderBy('id', 'desc')
            ->first();
        //dd($userid->id);
        $user->soc = $userid->id + 1;
        /*if(Hash::check($mot_de_passe, $user->password))
        {
            echo 'les deux mots de passe sont bons';
        }
        else{
            echo 'les deux mots de passe ne sont pas bons';
        }
        echo $mot_de_passe;
        dd($user->password);*/

        $user->save();
        Session::flash('success', 'La société a été ajoutée avec succés !');
        $mailable = new SocieteMessage($request->nomSociete, $request->email, $request->login, $mot_de_passe);
        Mail::to('admin@admin.sn')->send($mailable);

        return redirect()->route('cleannet.list');
    }
}
