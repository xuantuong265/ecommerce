<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;

class ProductsController extends Controller
{
     public function list_products($brand_id, $category_id)
     {
         // Lấy dữ liệu
         $result = DB::table('tbl_products')->where('id_b', $brand_id)->get();
         return view('admin.products.list_products')->with(['list_products' => $result, 'id_b' =>$brand_id, 'category_id' => $category_id]);
     }

     public function add_products($brand_id, $category_id)
     {
         // Lấy dữ liệu
        $result = DB::table('tbl_brand')
        ->where('category_id', $category_id)
        ->select('id', 'brand_name')
        ->get();
        return view('admin.products.add_products')->with(['brand'=> $result, 'id_b' => $brand_id, 'category_id' => $category_id]);
     }

     public function save_products(Request $request, $brand_id, $category_id)
     {
        // Thêm sản phẩm
        $data = array();
        $data['products_name'] = $request->products_name;
        $data['products_price'] = $request->products_price;
        $data['products_amount'] = $request->products_amount;
        $data['products_desc'] = $request->products_desc;
        $data['id_b'] = $request->brand_id;
        $data['created_at'] = Carbon::now();
        $data['views']  = '0';

        // Xử lý hình ảnh
       if ($request->hasFile('products_img')) {
                $foder = "public/customers/images/";
				$target_file = $foder.basename($_FILES['products_img']['name']);
				// upload file
				move_uploaded_file($_FILES['products_img']['tmp_name'], $target_file);
				$img = $_FILES['products_img']['name'];
       }

       $data['products_img'] = $img;
       DB::table('tbl_products')->insert($data);
       return redirect('admin/dashboard/list-products/'.$brand_id."/".$category_id);

     }

     public function delete_products($products_id, $brand_id, $category_id)
     {
         $data = DB::table('tbl_products')->where('products_id', $products_id)->delete();
         return redirect('admin/dashboard/list-products/'.$brand_id."/".$category_id);
     }

     public function edit_products($products_id, $brand_id, $category_id)
     {
        // Lấy dữ liệu ra form
        $data = DB::table('tbl_products')->where('products_id', $products_id)->get();
        return view('admin.products.edit_products')->with([
            'edit_products' => $data,
            'brand_id'      => $brand_id,
            'category_id'   => $category_id
        ]);
     }

    public function update_products(Request $request, $products_id, $brand_id, $category_id)
    {
        
        // Cập nhật dữ liệu
        $data = array();

        // Xử lý hình ảnh
        if ($request->hasFile('products_img')) {
            $foder = "public/customers/images/";
            $target_file = $foder.basename($_FILES['products_img']['name']);
            // upload file
            move_uploaded_file($_FILES['products_img']['tmp_name'], $target_file);
            $img = $_FILES['products_img']['name'];
   }
        
      $re =  DB::table('tbl_products')->where('products_id', $products_id)
        ->update([
            'products_name'      => $request->products_name,
            'products_price'     => $request->products_price,
            'products_amount'    => $request->products_amount,
            'products_desc'      => $request->products_desc,
            'products_img'       => $img
        ]);

        
        return redirect('admin/dashboard/list-products/'.$brand_id."/".$category_id);

    }

}
