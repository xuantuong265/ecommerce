@extends('customers-layout')
@section('content')

<div class="features_items"><!--features_items-->
    <h2 class="title text-center" style="margin-top: 15px;">Sản phẩm nổi bật</h2>
    @php
        $folder = "../../public/customers/images/";  
    @endphp
    @foreach ($list as $value)
    <div class="col-sm-4">
        <div class="product-image-wrapper" style="border-radius: 10px">
            <div class="single-products">
                <div class="productinfo text-center" style="padding: 1rem">
                    <img src=" {{ $folder. $value->products_img }}" style="width: 200px; height: 200px;" alt="" />
                    <h2>{{ number_format($value->products_price) }} đ</h2>
                    <p style="width: 100%; height: 40px; overflow: hidden;">{{ $value->products_name }}</p>
                    <a  href="{{ Route('addCart', ['products_id' => $value->products_id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{ URL::to('/detail-products/'.$value->products_id."/".$value->id_b) }}"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
                    <li><i class="fas fa-eye"></i>&ensp;{{ $value->views }} lượt xem</li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div><!--features_items-->
{{-- 
 Phân trang --}}

 {{ $list->links() }}
     


@endsection