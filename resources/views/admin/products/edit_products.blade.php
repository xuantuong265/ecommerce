@extends('admin-layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel" style="margin: 40px auto !important; width: 70% !important;">
                <div class="panel panel-primary">
                <header class="panel-heading">
                    Form cập nhật sản phẩm
                </header>
                <div class="panel-body">
                 @foreach ($edit_products as $item)

                    <div class="position-center">
                    <form role="form" method="post" enctype="multipart/form-data" action="{{URL::to('admin/dashboard/update-products/'.$item->products_id. "/".$brand_id."/".$category_id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương sản phẩm:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="products_name" value="{{ $item->products_name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh:</label>
                            <input type="file" id="exampleInputEmail1" name="products_img">
                        </div>
                        <div class="form-group">Giá:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="products_price" value="{{ $item->products_price }}">
                        </div>
                        <div class="form-group">Số lượng:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="products_amount" value="{{ $item->products_amount }}">
                        </div>
                        <div class="form-group">Mô tả:</label>
                            <textarea name="products_desc" class="form-control" rows="10">
                                {{ $item->products_desc }}
                            </textarea>
                        </div>
           
                        <button type="submit" name="add_brand" class="btn btn-info">Cập nhật</button>
                        
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>
    </div>
    </div>
    
</div>


    
@endsection