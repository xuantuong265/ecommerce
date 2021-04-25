@extends('admin-layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel" style="margin: 40px auto !important; width: 60% !important;">
                <div class="panel panel-primary">
                <header class="panel-heading">
                    Form thêm thương hiệu
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    <form role="form" method="post" action="{{URL::to('admin/dashboard/save-brand/'.$category_id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Trạng thái:</label>
                            <select class="form-control m-bot15" name="brand_status">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chuyên mục:</label>
                            <select class="form-control m-bot15" name="category_id">
                                 @foreach ($category as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->category_name }}</option>
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