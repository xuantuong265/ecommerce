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
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                       {{-- Tìm kiếm theo giá--}}
                            @include('pages.elements.form-search-price')
                       {{-- end Tìm kiếm theo giá--}}
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">

<div class="product-details"><!--product-details-->
     @php
          $folder = "public/customers/images/";  
     @endphp
     @foreach ($product_detail as $item)
         
     <div class="col-sm-5">
          <div class="view-product" >
               <img src="{{ asset($folder. $item->products_img) }}" alt="" style="width: 300px; height: 300px; padding: 2rem; border-radius: 10px" />
          </div>
     </div>
     <div class="col-sm-7">
          <div class="product-information" style="border-radius: 10px;"><!--/product-information-->
               <img src="{{asset('public/customers/images/product-details/new.jpg')}}" class="newarrival" alt="" />
               <h2>{{ $item->products_name }}</h2>
               <span>Web ID: 1089772</span> <br>
               @if($item->products_amount > 0)
               <span>Số lượng còn trong kho: {{ $item->products_amount }} sản phẩm.</span> <br>
               <span style="font-size: 16px">Giá: {{ number_format($item->products_price) }} VND</span> <br>
               <a  href="{{ Route('addCart', ['products_id' => $item->products_id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              @else
                    <label>Sản phẩm hiện tại tạm thời đã hết hàng !!! Xin vui lòng đợi.</label>
              @endif
          </div><!--/product-information-->
     </div>
     @endforeach
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
     <div class="col-sm-12">
          <ul class="nav nav-tabs">
               <li><a href="#details" data-toggle="tab">Xem chi tiết sản phẩm</a></li>
          <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá ({{ $count }})</a></li>
          </ul>
     </div>
     <div class="tab-content">
          <div class="tab-pane fade" id="details" >
               
               @php
                   echo $item->products_desc;
               @endphp
               
          </div>   
    
          
         @if (Session::has('customers_name'))
         <div class="tab-pane fade active in" id="reviews" >
          
          <div class="col-sm-12">
          @foreach ($cmt as $item)
               <ul>
                    <li><a href=""><i class="fa fa-user"></i>{{ $item->name_user }}</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>{{ $item->created_at }}</a></li>
               </ul>
               <p>{{ $item->comments_content }}</p>
               @endforeach
               <form action="{{ URL::to('/save-cmt/'.$products_id). "/".$brand_id }}" method="post">
                    @csrf
                    <span>
                         <input type="text" placeholder="Your Name" name="name_user" id="name_user">
                         <input type="email" placeholder="Email Address" name="email" id="email">
                    </span>
                    <textarea name="content" id="content"></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="submit" class="btn btn-default pull-right" id="cmt">
                         Submit
                    </button>
               </form>
          </div>
     </div>
         @else
             Vui lòng đăng nhập để bình luận
         @endif
          
     </div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
     <h2 class="title text-center">sản phẩm liên quan</h2>
     @php
          $folder = "../../public/customers/images/";  
     @endphp
    
         
     
     <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
              
               <div class="item active">
                @foreach ($list_sp as $item)	
                    <div class="col-sm-4">
                         <div class="product-image-wrapper">
                              <div class="single-products">
                                   <div class="productinfo text-center">
                                        <img src=" {{ $folder. $item->products_img }}" style="width: 200px; height: 200px;" alt="" />
                                        <h4>{{ number_format($item->products_price) }} đ</h4>
                                        <p>{{ $item->products_name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                   </div>
                              </div>
                         </div>
                    </div>
               @endforeach
               </div>
             

              
               <div class="item">	
                         @foreach ($list_sp as $item)
                    <div class="col-sm-4">
                         <div class="product-image-wrapper">
                              <div class="single-products">
                                   <div class="productinfo text-center">
                                        <img src=" {{ $folder. $item->products_img }}" style="width: 200px; height: 200px;" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                   </div>
                              </div>
                         </div>
                    </div>
                    @endforeach
               </div>
              
          </div>
           <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
               <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
               <i class="fa fa-angle-right"></i>
            </a>			
     </div>
    
</div><!--/recommended_items-->
  
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

