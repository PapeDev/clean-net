<?php

namespace App\Http\Controllers;

use App\Article;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use PDF;

class PdfController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::all();
        view()->share('clients',$clients);
        if($request->has('download')){
            $pdf = PDF::loadView('clients.htmltopdf');
            return $pdf->download('clients.htmltopdf');
        }
        return view('clients.htmltopdf');
    }
    public function createPDF($datos, $visteur, $tipo)
    {
        $data = $datos;
        $date = date('Y-m-d');
        $view = View::make($visteur, compact('data', 'date'))->render();
    }
    public function getPDF()
    {
        $clients = Client::all();
        //return view('clients.htmltopdf', compact('clients'));
        $pdf = PDF::loadView('clients.htmltopdf', ['clients'=>$clients]);
        return $pdf->stream(date('Y-m-d').'clients.pdf');

    }

    public function getReportLinge()
    {
        $lingesHomme = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->where('categories.name', 'Homme')->get();

        $lingesFemme = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->where('categories.name', 'Femme')->get();

        $lingesEnfant = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->where('categories.name', 'Enfant')->get();
        //dd($lingesHomme);
        return view('reports.linges', compact('lingesHomme', 'lingesFemme', 'lingesEnfant'));


    }
}
