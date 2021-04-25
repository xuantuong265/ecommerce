@extends('admin-layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel" style="margin: 40px auto !important; width: 60% !important;">
                <div class="panel panel-primary">
                <header class="panel-heading">
                    Form thêm chuyên mục
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    <form role="form" method="post" action="{{URL::to('admin/dashboard/save-category')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chuyên mục:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="category_name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Trạng thái:</label>
                            <select class="form-control m-bot15" name="category_status">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
           
                        <button type="submit" name="add_category" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
</div>


    
@endsection