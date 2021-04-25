@extends('admin-layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Form cập nhật chuyên mục
                </header>
                <div class="panel-body" style="width: 50%; margin: 40px auto;">
                    @foreach ($edit_category as $key => $value)
                        <div class="position-center">
                        <form role="form" method="post" action="{{URL::to('admin/dashboard/update-category/'.$value->id)}}">
                            @csrf
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên chuyên mục:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" value="{{ $value->category_name }}">
                            </div>
                            
                            <button type="submit" name="add_category" class="btn btn-info">Thêm</button>
                        </form>
                        </div>
                    @endforeach
                </div>
            </section>

    </div>
    
</div>
    
@endsection