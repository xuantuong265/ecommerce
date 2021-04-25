<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages.elements.head')
</head><!--/head-->

<body>
<!--header-->
    <header id="header">
    <!--header_top-->
        <div class="header_top">
            @include('pages.elements.header-top')
        </div>
    <!--/header_top--> 
    <!--header-middle-->
        <div class="header-middle">
            @include('pages.elements.header-middle')
        </div>
    <!--/header-middle-->
    <!--header-bottom-->
        <div class="header-bottom">
            @include('pages.elements.header-bottom')
        </div>
    <!--/header-bottom-->
    </header>
<!--/header-->
    
    <!--slider-->
    <section id="slider">
        @include('pages.elements.slider')
    </section>
    <!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                       {{-- Tìm kiếm theo giá--}}
                            @include('pages.elements.form-search-price')
                       {{-- end Tìm kiếm theo giá--}}
                       @include('pages.elements.thongke')
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">

        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Sản phẩm mới</h2>
            @php
              $folder = "public/customers/images/";  
            @endphp
            <?php 
            if ( $data == null ) {
                exit();
            }
        ?>
            @foreach ($products as $item)
                
            <div class="col-sm-4">
                <div class="product-image-wrapper" style="border-radius: 10px">
                    <div class="single-products" >
                        <div class="productinfo text-center" style="padding: 2rem !important;">
                            <img src=" {{ $folder. $item->products_img }}" style="width: 200px; height: 200px;" alt="" />
                            <h2>{{ number_format($item->products_price) }} đ</h2>
                            <p style="width: 100%; height: 40px; overflow: hidden;">{{ $item->products_name }}</p>
                            <a  href="{{ Route('addCart', ['products_id' => $item->products_id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="{{ URL::to('/detail-products/'.$item->products_id."/".$item->id_b) }}"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
                            <li><i class="fas fa-eye"></i>&ensp;{{ $item->views }} lượt xem</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--features_items-->


         <div class="features_items"><!--features_items-->
            <h2 class="title text-center" style="margin-top: 15px;">Sản phẩm bán chạy</h2>
            <?php 
                if ( $data == null ) {
                    exit();
                }
            ?>
            @foreach ($data as $value)
                
            <div class="col-sm-4">
                <div class="product-image-wrapper" style="border-radius: 10px">
                    <div class="single-products" >
                        <div class="productinfo text-center" style="padding: 2rem !important;">
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

       
    </div>
</div>
</div>
</section>

<footer id="footer"><!--Footer-->
@include('pages.elements.footer')
</footer>
<!--/Footer-->

<!--/jscrip-->
@include('pages.elements.jscrip')
</body>
</html>       
 