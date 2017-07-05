<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->select('id', 'name', 'created_at')->orderBy('created_at', 'DESC')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|min:2|max:255'
        ));
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Categorie ajoutée avec succes');
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|min:2|max:255'
        ));
        $category = Category::findOrFail($id);
        $category->name = $request->name;

        $category->save();
        Session::flash('success', 'Categorie mise à jour avec succes !');
        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete($id);
        Session::flash('success', 'Categorie supprimé');
        return redirect('admin/categories')->with('status', 'Category Deleted');
    }
}
