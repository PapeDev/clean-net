<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getIndex()
    {
        $client = DB::table('clients')
            ->select(DB::raw('count(*) as client_count'))
            ->where([
                ['actif', '=', '1'],
                ['estSupprime', '=', '0'],
            ])
            ->first();
        $clientinactifs = DB::table('clients')
            ->select(DB::raw('count(*) as client_count'))
            ->where([
                ['actif', '=', '0'],
                ['estSupprime', '=', '1'],
            ])
            ->first();
        //dd($client);
        return view('admin.index', compact('client', 'clientinactifs'));
    }
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'email' => 'email|required|unique:users',
            'login' => 'required|unique:users|min:3|max:12',
            'password' => 'required|min:4|max:255'
        ]);
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'login' => $request->input('login'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        Session::flash('success', 'Compte crée avec succés !');

        return redirect()->route('login');
    }
}
