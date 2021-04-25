<div class="left-sidebar">
    
        <div class="brands_products"><!--brands_products-->
            <h2>Thương hiệu</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($brand as $item)
                        @if ($item->brand_status == 1)
                            <li><a href="{{ URL::to('/products-list-brand/'.$item->category_id. "/".$item->id) }}">{{ $item->brand_name }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div><!--/brands_products-->
    
      @include('pages.elements.thongke')
    </div>