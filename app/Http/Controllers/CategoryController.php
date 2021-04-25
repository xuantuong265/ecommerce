<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Model\category;
session_start();

class CategoryController extends Controller
{
   
    public function add_category()
    {
        return view('admin.category.add_category');
    }

    public function all_category(Request $request)
    {
        $category = DB::table('tbl_category')->orderBy('id', 'desc')->get();
        return view('admin.category.all_category')->with('category', $category);

    }

    public function save_category(Request $request)
    {
        $category = new category();
        $category->category_name   = $request->category_name;
        $category->category_status = $request->category_status;
        $category->save();

        return redirect(Route('dashboard'));
    }

    public function unactive($id)
    {
        $category = category::find($id);
        $category->category_status = '0';
        $category->save();
        return redirect(Route('dashboard'));
    }

    public function active($id)
    {
        $category = category::find($id);
        $category->category_status = '1';
        $category->save();
        return redirect(Route('dashboard'));
    }

    public function edit_category($id)
    {
       $category = category::find($id)->get();
       return view('admin.category.edit_category')
       ->with('edit_category', $category); 
    }

    public function update_category(Request $request, $id)
    {
        $category = category::find($id);
        $category->category_name = $request->category_name;
        $category->save();

        return redirect( Route('dashboard') );
        
    }

    public function delete_category($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect( Route('dashboard') );
    }

   
}
