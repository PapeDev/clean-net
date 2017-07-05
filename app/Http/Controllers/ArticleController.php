<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $articles = Article::get();
        //dd($articles);
        return view('admin.articles.index', compact('articles'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|min:2|max:255',
            'price' => 'required',
            'category_id' => 'required|integer',
            'image' => 'sometimes|image'
        ));

        $article = new Article();
        $article->title = $request->title;
        $article->price = $request->price;
        $article->status = 1;
        $article->user_id = Auth::user()->id;
        $article->category_id = $request->category_id;
        //dd($post);

        //save images
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename  = time() . rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);

            $article->image = $filename;
        }

        $article->save();
        Session::flash('success', 'Article ajouté avec succés !');
        return redirect()->route('articles.show', $article->id);

    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        return view('admin.articles.show', compact('article', 'cats'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        return view('admin.articles.edit', compact('article', 'cats'));
    }

    public function update($id, Request $request)
    {
        $article = Article::find($id);

        $this->validate($request, array(
            'title' => 'required|min:2|max:255',
            'price' => 'required',
            'category_id' => 'required|integer',
            'image' => 'sometimes|image'
        ));


        $article->title = $request->input('title');
        $article->price = $request->input('price');
        $article->category_id = $request->input('category_id');

        if($request->hasFile('image')){
            $image = $request->file('image');

            $salt_snews = substr(str_shuffle('AuO^sl0i$eneRem78iw'),0, 1) . substr(str_shuffle('Au0O^sl0i$eneR781em78iw'),0, 31);

            $filename  = $salt_snews . time() . rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);

            $oldFilename = $article->image;

            $article->image = $filename;

            Storage::delete($oldFilename);
        }
        $article->save();
        // set flash data with success
        Session::flash('success', 'Article modifié avec succés !');
        //redirect with flash
        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        Storage::delete($article->image);
        $article->delete();

        Session::flash('success', 'Article supprimé avec succés');
        return redirect()->route('articles.index');
    }
}
