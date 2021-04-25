<?php

namespace App\Http\Controllers;
use App\Model\brand;
use App\Model\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class BrandController extends Controller
{
    public function list_brand($category_id)
    {
        
        $data = DB::table('tbl_brand')->where('category_id', $category_id)->orderBy('id', 'desc')->get();
        return view('admin.brand.list_brand')->with(['list_brand'=> $data, 'category_id' => $category_id]);
    }

    public function edit_brand($brand_id)
    {
        // Lấy dữ liệu
        $result = DB::table('tbl_brand')
        ->where('id', $brand_id)
        ->get();
        return view('admin.brand.edit_brand')->with('edit_brand', $result);
    }

    public function update_brand(Request $request, $category_id, $brand_id)
    {
        // Cập nhật thương hiệu
        $brand_name = $request->brand_name;
        DB::table('tbl_brand')
        ->where('id', $brand_id)
        ->update(['brand_name'=> $brand_name]);
        return redirect('admin/dashboard/list-brand/'.$category_id);
    }

    public function delete_brand($category_id, $brand_id)
    {
        // xóa
        DB::table('tbl_brand')->where('id', $brand_id)->delete();
        return redirect('admin/dashboard/list-brand/'.$category_id);
    }

    public function add_brand($category_id)
    {
        // Lấy dữ liệu
        $result = DB::table('tbl_category')
        ->select('id', 'category_name')
        ->get();
        // $data = category::find($category_id)->get();
        return view('admin.brand.add_brand')->with(['category'=> $result, 'category_id' => $category_id]);
    }

    public function save_brand(Request $request, $category_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_status'] = $request->brand_status;
        $data['category_id'] = $request->category_id;

        // Thêm thương hiệu
        DB::table('tbl_brand')->insert($data);
        return redirect('admin/dashboard/list-brand/'.$category_id);
    }

    public function unactive($category_id, $brand_id)
    {
        $brand = brand::find($brand_id);
        $brand->brand_status = '0';
        $brand->save();
        return redirect('admin/dashboard/list-brand/'.$category_id);
    }

    public function active($category_id, $brand_id)
    {
        $brand = brand::find($brand_id);
        $brand->brand_status = '1';
        $brand->save();
        return redirect('admin/dashboard/list-brand/'.$category_id);
    }
}
