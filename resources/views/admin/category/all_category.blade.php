@extends('admin-layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-primary">
    <div class="panel-heading">
        Danh sách chuyên mục
    </div>
    
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>STT</th>
            <th>Tên chuyên mục: </th>
            <th>Trạng thái: </th>
            <th>Xử lý</th>
          </tr>
        </thead>
        <tbody id="myTable">
        
          <?php $stt = 0 ?>
          @foreach ($category as $key => $value)
            <?php $stt++; ?>
            <tr>
              <td>{{ $stt }}</td>
              <td><a href="{{URL::to('admin/dashboard/list-brand/'.$value->id)}}">{{ $value->category_name }}</a></td>
                <td><span class="text-ellipsis">
                        @if ($value->category_status == '1')
                          <a href="{{URL::to('admin/dashboard/unactive/'.$value->id)}}">Hiển thị</a>
                        @else
                          <a href="{{URL::to('admin/dashboard/active/'.$value->id)}}">Ẩn</a>
                        @endif
                    </span>
                </td>
                <td>
                  <a href="{{URL::to('admin/dashboard/edit-category/'.$value->id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                  <a href="{{URL::to('admin/dashboard/delete-category/'.$value->id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                </td>
            </tr>
                  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection