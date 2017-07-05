<?php

namespace App\Http\Controllers;

use App\Article;
use App\Client;
use App\Depot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepotController extends Controller
{
    public function create($id)
    {
        $client = Client::findOrFail($id);
        $linges = Article::all();
        $articles = [];
        foreach ($linges as $linge)
        {
            $articles[$linge->id] =
                $linge->title. " | ".
                $linge->category->name. " | ".
                $linge->price. " F CFA";
        }
        return view('depots.create', compact('client', 'articles', 'linges'));
    }

    public function getAddLinge(Request $request, $id, $ClientID)
    {
        //dd($request->id);
        $linge = Article::find($id);
        $oldCart = Session::has('linge') ? Session::get('linge') : null;
        $depot = new Depot($oldCart);
        $depot->add($linge, $linge->id);
        $request->session()->put('linge', $depot);
        //dd($request->session()->get('cart'));
        return redirect()->route('depots.create', $ClientID);
    }

    public function getLingeClient()
    {
        if(!Session::has('linge'))
        {
            return view('depots.depot-client');
        }
        $oldCart = Session::get('linge');
        $depot = new Depot($oldCart);
        return view('depots.depot-client', ['linges' => $depot->items, 'totalPrice' => $depot->totalPrice]);
    }

}
