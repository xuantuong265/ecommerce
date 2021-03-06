<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Model\category;
use App\Model\brand;
use App\Model\products;
use App\Model\customers;
use App\Model\viewsCount;
use Session;
session_start();
use Illuminate\Support\Facades\View;
use Symfony\Component\Routing\Route;
use Carbon\Carbon;


class HomeController extends Controller
{

    // Phương thức Share data cho tất cả View
    public function __construct()
    {
        $category = DB::table('tbl_category')->get();
        View::share('category', $category);
    }

     public function index()
     {
         // hiển thị category
         $category = category::all();
         $products = null;
         $data     = null;
         foreach ($category as $key => $value) {
            if ($value->category_status == '1') {
                $products = DB::table('tbl_products')
                        ->join('tbl_brand', 'tbl_products.id_b', '=', 'tbl_brand.id')
                        ->select('tbl_products.*', 'tbl_brand.brand_name')
                        ->where('brand_status', '1')
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();
    
                // Sản phẩm bán chạy
                $data  = DB::table('tbl_products')
                        ->join('tbl_brand', 'tbl_products.id_b', '=', 'tbl_brand.id')
                        ->select('tbl_products.*', 'tbl_brand.brand_name')
                        ->where('brand_status', '1')
                        ->inRandomOrder()
                        ->take(3)
                        ->get();
             }


            
             return view('pages.home')->with([
                'products'    => $products,
                'data'        => $data
            ]);
         }
        
     }

     
   
     // Chi tiết sản phẩm

     public function detail_products($products_id, $brand_id)
     { 
         // Lấy dữ liệu sản phẩm
         $datas = DB::table('tbl_products')->where('products_id', $products_id)->get();

         // Sản phẩm liên quan
         $list_sp = DB::table('tbl_products')->whereNotIn('products_id', [$products_id])->inRandomOrder()->take(3)->get();

        // Hiển thị bình luận
        $cmt = DB::table('tbl_comments')
            ->where('id_pro', $products_id)
            ->where('status', 0)
            ->get();
        // Đếm số bình luận

        $count = DB::table('tbl_comments')
        ->where('id_pro', $products_id)
        ->where('status', 0)
        ->count();

        // Lượt xem của sản phẩm
        $sessionKey = 'products_' . $products_id;
        $sessionView = Session::get($sessionKey);
        $products = products::findOrFail($products_id);
        if (!$sessionView) { //nếu chưa có session
            Session::put($sessionKey, 1); //set giá trị cho session
            $products->increment('views');
        }

         return view('pages.products-detail')->with([
             'product_detail'    => $datas,
             'list_sp'           => $list_sp,
             'products_id'       => $products_id,
             'brand_id'          => $brand_id,
             'cmt'               => $cmt,
             'count'             => $count
         ]);

         
     }

     // Danh sách thương hiệu sản phẩm

     public function products($category_id)
     {
        $data = DB::table('tbl_brand')
                    ->where('category_id', $category_id)
                    ->where('brand_status', '1')
                    ->get();
           // danh sách sản phẩm
            $list = DB::table('tbl_products')
                        ->join('tbl_brand', 'tbl_products.id_b', '=', 'tbl_brand.id')
                        ->select('tbl_products.*', 'tbl_brand.brand_name')
                        ->where('tbl_brand.category_id', '=', $category_id)
                        ->where('brand_status', '1')
                        ->paginate(6);
            
        return  view('pages.category-products')->with([
            'brand'    => $data,
            'list'     => $list
        ]);
        // return view('customers-layout')->with('brand', $data);
     }

     // Danh sách sản phẩm theo thương hiệu

     public function list_products_brand($category_id, $brand_id)
     {
        $data = DB::table('tbl_brand')->where('category_id', $category_id)
                                      ->get();
            // danh sách sản phẩm
            $list = DB::table('tbl_products')
                        ->join('tbl_brand', 'tbl_products.id_b', '=', 'tbl_brand.id')
                        ->select('tbl_products.*', 'tbl_brand.brand_name')
                        ->where('tbl_brand.category_id', '=', $category_id)
                        ->where('tbl_brand.id', '=', $brand_id)
                        ->paginate(6);


        return  view('pages.list-products-brand')->with([
            'brand'    => $data,
            'list'     => $list
        ]);
     }

     public function search(Request $request)
     {
         $search = $request->search;
         if ($search == null) {
            return redirect()->back();
         }
         $datas  = DB::table('tbl_products')     
                            ->where('products_name','like', $search.'%')
                            ->get();
        $i = 0;
        foreach($datas as $item)
        {
            $i++;
        }
        return  view('pages.search')->with([
            'search'      => $datas,
            'sl'          => $i,
            'key'         => $search
        ]);
     }

     public function search_price(Request $request)
     {
         $start = $request->start;
         $end   = $request->end;

         $datas = DB::table('tbl_products')
                ->whereBetween('products_price', [$start, $end])->get();

        $i = 0;
        foreach($datas as $item)
        {
            $i++; // Số lượng
        }
        return  view('pages.search-price')->with([
            'search'      => $datas,
            'sl'          => $i
        ]);
     }

     public function formRegistration()
     {
         return view('pages.form_registration');
     }

     public function formLogin()
     {
         return view('pages.form_login');
     }

     public function registration(Request $request)
     {
         $customers = new customers(); // Gọi model
         $customers->customers_name        = $request->name;
         $customers->customers_email       = $request->email;
         $customers->customers_password    = $request->password;
         $customers->customers_address     = $request->address;
         $customers->customers_sex         = $request->sex;
         $customers->customers_phone       = $request->phone;

         $customers->save();
         Session::flash('success', "Bạn đã đăng ký thành công !");
         return redirect( Route('formLogin') );
        
     }

     public function login(Request $request)
     {
         $customers = DB::table('tbl_customers')
                               ->where('customers_email', $request->email)
                               ->where('customers_password', $request->password)
                               ->first();
        if ($customers) 
        {
            $request->session()->put('customers_name', $customers->customers_name);
            return redirect(Route('trangchu'));
        }
        else
        {
            $request->session()->flash('errors', 'Tài khoản hoặc mật khẩu không chính xác !');
            return redirect(Route('formLogin'));
        } 
     }

     public function logout()
     {
        Session::put('customers_name', null);
        return redirect( Route('trangchu') );
     }

     public function cart($products_id)
     {
        // Lấy dữ liệu từ bảng tbl_products
        $datas = DB::table('tbl_products')
                          ->where('products_id', $products_id)
                          ->get();
        Session::push('cart', $datas);
        return redirect('/list-cart'); 
     }

     public function listCart()
     {
        return view('pages.cart')->with([
            'cart'     => Session::get('cart')
        ]);
     }

     public function Comments(Request $request, $products_id, $brand_id)
     {
         $data = array();
         $data['name_user']         = $request->name_user;
         $data['email']             = $request->email;
         $data['comments_content']  = $request->content;
         $data['id_pro']            = $products_id;
         $data['status']            = 1;
         $data['created_at']        = Carbon::now();
         $data['date']        = Carbon::now();

         DB::table('tbl_comments')->insert($data);
        
         
        return redirect('detail-products/'.$products_id .'/'.$brand_id);
     }

     public function blog()
     {
        return view('pages.blog');
     }


 
}
        