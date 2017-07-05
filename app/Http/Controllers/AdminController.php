<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

    public function getParametrage()
    {
        $user = Auth::user();
        return view('admin.parametrage', compact('user'));
    }

    public function getParametresUpdate(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $this->validate($request, array(
            'nomSociete' => 'required',
            'email' => 'required|email|min:9',
            'login' => 'required|min:2|max:255',
            'name' => 'required',
            'adresse' => 'required|min:9',
            'telephone' => 'required|min:9',
            'logoSociete' => 'sometimes|image',
            'fax' => 'required|min:9',

        ));

        $user->nomSociete = $request->input('nomSociete');
        $user->email = $request->input('email');
        $user->login = $request->input('login');
        $user->name = $request->input('name');
        $user->adresse = $request->input('adresse');
        $user->telephone = $request->input('telephone');
        $user->logoSociete = $request->input('logoSociete');
        $user->fax = $request->input('fax');

        if($request->hasFile('logoSociete')){
            $image = $request->file('logoSociete');

            $salt_snews = substr(str_shuffle('AuO^sl0i$eneRem78iw'),0, 1) . substr(str_shuffle('Au0O^sl0i$eneR781em78iw'),0, 31);

            $filename  = $salt_snews . time() . rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);

            $oldFilename = $user->logoSociete;

            $user->logoSociete = $filename;

            Storage::delete($oldFilename);
        }

        $user->save();
        // set flash data with success
        Session::flash('success', 'Informations Societes modifiées avec succés !');
        //redirect with flash
        return redirect()->route('admin.parametrage');
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
