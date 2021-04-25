@extends('admin-layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Form cập nhật thương hiệu
                </header>
                <div class="panel-body" style="width: 50%; margin:40px auto">
                    @foreach ($edit_brand as $key => $value)
                        <div class="position-center">
                        <form role="form" method="post" action="{{URL::to('admin/dashboard/update-brand/'.$value->category_id. '/'.$value->id)}}">
                            @csrf
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên chuyên mục:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name" value="{{ $value->brand_name }}">
                            </div>
                            
                            <button type="submit" name="add_category" class="btn btn-info">Cập nhật</button>
                        </form>
                        </div>
                    @endforeach
                </div>
            </section>

    </div>
    
</div>
    
@endsection