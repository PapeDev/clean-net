<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function getIndex()
    {
        $clients = DB::table('clients')
            ->where([
                    ['actif', '=', '1'],
                        ['estSupprime', '<>', '1'],
                    ])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
            'nom' => 'required|min:2|max:255',
            'prenom' => 'required|min:2|max:255',
            'adresse' => 'required',
            'tel' => 'required|min:9',
            'email' => 'required|email|min:9',
        ));

        $client = new Client();
        $client->title = $request->title;
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->adresse = $request->adresse;
        $client->tel = $request->tel;
        $client->email = $request->email;
        $client->actif = 1;
        $client->estSupprime = 0;
        //dd($post);


        $client->save();
        Session::flash('success', 'Client ajouté avec succés !');
        return redirect()->route('clients');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        /*$cli = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }*/
        return view('clients.show', compact('client'));
    }

    public function update($id, Request $request)
    {
        $client = Client::findOrFail($id);

        $this->validate($request, array(
            'title' => 'required',
            'nom' => 'required|min:2|max:255',
            'prenom' => 'required|min:2|max:255',
            'adresse' => 'required',
            'tel' => 'required|min:9',
            'email' => 'required|email|min:9',
        ));


        $client->title = $request->input('title');
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->adresse = $request->input('adresse');
        $client->tel = $request->input('tel');
        $client->email = $request->input('email');

        $client->save();
        // set flash data with success
        Session::flash('success', 'Informations clients modifiées avec succés !');
        //redirect with flash
        return redirect()->route('clients.show', $client->id);
    }
}
