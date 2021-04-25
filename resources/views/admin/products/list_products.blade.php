@extends('admin-layout')
@section('admin_content')


<div class="table-agile-info">
  <div class="panel panel-primary">
    <div class="add-brand">
        <a href="{{URL::to('admin/dashboard/add-products/'.$id_b ."/".$category_id)}}">Thêm sản phẩm</a>
    </div>
    <div class="panel-heading" style="font-size: 16px !important;">
        Danh sách sản phẩm
    </div>
    
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>STT: </th>
            <th>Tên thương sản phẩm: </th>
            <th>Hình ảnh: </th>
            <th>Đơn giá: </th>
            <th>Số lượng: </th>
            <th>Xử lý</th>
          </tr>
        </thead>
        <tbody>
            
           <?php $stt = 0 ?>
          @foreach ($list_products as $key => $value)
            <?php $stt++ ?>
            <tr>
                <td>{{ $stt }}</td>
                <td>{{ $value->products_name }}</td>
                <td><img src=" {{URL::to('public/customers/images/'.$value->products_img)}} " style="width: 100px; height: 50px;"></td>
                <td>{{ number_format($value->products_price) }}</td>
                <td>{{ $value->products_amount }}</td>
              <td>
               <a href="{{URL::to('admin/dashboard/edit-products/'.$value->products_id. '/' .$value->id_b."/".$category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-danger text"></i></a>
                <a href="{{URL::to('admin/dashboard/delete-products/'.$value->products_id. '/' .$value->id_b."/".$category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
                  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection