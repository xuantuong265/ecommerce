<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\products;
use DB;
use Session;
use Illuminate\Support\Facades\View;
use Cart;
use Carbon\Carbon;
use App\Model\detail_orders;
use App\Model\orders;

class CartController extends Controller
{

    public function __construct()
    {
        $category = DB::table('tbl_category')->get();
        View::share('category', $category);
    }

    public function addCart(Request $request, $products_id)
    {
        $products       = products::find($products_id);
        
        // Cart
        $data['id']     = $products->products_id;
        $data['qty']    = '1';
        $data['name']   = $products->products_name;
        $data['weight']   = $products->products_price;
        $data['price']  = $products->products_price;
        $data['options']['image']    = $products->products_img;
        Cart::add($data);
        return redirect(Route('listCart'));
    }

    public function listCart()
    {
        return view('pages.cart');
    }

    public function deleteCart($rowId)
    {
        Cart::remove($rowId);
        return redirect( Route('listCart') );
    }

    public function updateCart(Request $request)
    {
        $rowId    = $request->rowIdCart;
        $qty      = $request->qty_cart;
        Cart::update($rowId, $qty);
        return redirect(Route('listCart'));
    }

    public function payment(Request $request)
    {
        // // Thêm thông tin khách hàng
        $content = Cart::content();
        $total = 0;
        foreach ($content as $key => $item) {
           $total += $item->price;
        }
        $orders = new orders();
        $orders->name_customers     = $request->name;
        $orders->email              = $request->email;
        $orders->date               = Carbon::now();
        $orders->phone_customers    = $request->sdt;
        $orders->address            = $request->address;
        $orders->total              = $total;
        $orders->notes              = $request->notes;
        $orders->save();

        // Thêm sản phẩm từ giỏ hàng
        
        
        foreach ($content as $value) {
            $detail_orders  = new detail_orders();
            $detail_orders['id_od']             = $orders->orders_id;
            $detail_orders['products_id']       = $value->id;
            $detail_orders['amounts']           = $value->qty;
            $detail_orders['price']             = $value->price;
            $detail_orders['date']              = Carbon::now();
            $detail_orders->save();

            // Cập nhật lại số lượng sản phẩm
            $products = products::find( $value->id );
            $products->products_amount = $products->products_amount-$value->qty;
            $products->save();
        }

        // Hủy các sản phẩm trong giỏ hàng
        Cart::destroy();
        Session::flash('Thanhtoan', 'Bạn đã thanh toán thành công ! Vui lòng đợi, sản phẩm đang được vận chuyển tới.');
        return redirect(Route('listCart'));
    }
}
