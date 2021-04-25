@extends('admin-layout')
@section('admin_content')


<div class="table-agile-info">
  <div class="panel panel-primary">
    <div class="add-brand">
        <a href="{{URL::to('admin/dashboard/add-brand/'.$category_id)}}">Thêm thương hiệu</a>
    </div>
    <div class="panel-heading" style="font-size: 16px !important;">
        Danh sách thương hiệu
    </div>
    
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
              <th>STT</th>
            <th>Tên thương hiệu: </th>
            <th>Trạng thái: </th>
            <th>Xử lý</th>
          </tr>
        </thead>
        <tbody>
        
          <?php $stt = 0; ?>
          @foreach ($list_brand as $key => $value)
          <?php $stt++; ?>
            <tr>
              <td>{{ $stt }}</td>
              <td><a href="{{URL::to('admin/dashboard/list-products/'.$value->id."/".$value->category_id)}}">{{ $value->brand_name }}</a></td>
                <td><span class="text-ellipsis">
                        @if ($value->brand_status == '1')
                          <a href="{{URL::to('admin/dashboard/unactive-brand/' .$value->category_id. '/'.$value->id)}}">Hiển thị</a>
                        @else
                          <a href="{{URL::to('admin/dashboard/active-brand/' .$value->category_id. '/'.$value->id)}}">Ẩn</a>
                        @endif
                    </span>
                </td>
                <td>
                  <a href="{{URL::to('admin/dashboard/edit-brand/'.$value->id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                  <a href="{{URL::to('admin/dashboard/delete-brand/'.$value->category_id. '/' .$value->id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                </td>
            </tr>
                  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection