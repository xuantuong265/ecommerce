@extends('admin-layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel" style="margin: 40px auto !important; width: 70% !important;">
                <div class="panel panel-primary">
                <header class="panel-heading">
                    Form thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    <form role="form" method="post" enctype="multipart/form-data" action="{{URL::to('admin/dashboard/save-products/'.$id_b."/".$category_id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương sản phẩm:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="products_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh:</label>
                            <input type="file" id="exampleInputEmail1" name="products_img">
                        </div>
                        <div class="form-group">Giá:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="products_price">
                        </div>
                        <div class="form-group">Số lượng:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="products_amount">
                        </div>
                        <div class="form-group">Mô tả:</label>
                            <textarea name="products_desc" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương hiệu:</label>
                            <select class="form-control m-bot15" name="brand_id">
                                 @foreach ($brand as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
           
                        <button type="submit" name="add_brand" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
    </div>
    
</div>


    
@endsection