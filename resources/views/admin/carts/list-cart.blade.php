@extends('admin-layout')
@section('admin_content')

<h3 style="text-align: center; margin-bottom: 30px; ">Quản lý giỏ hàng</h3>
<div class="form">
  @include('admin.elements.form-search-cart')   
</div>
<div class="table-agile-info">
    <div class="panel panel-primary">
      <div class="panel-heading" style="font-size: 16px !important;">
          Danh sách khách hàng
      </div>
      
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>STT: </th>
              <th>Tên khách hàng: </th>
              <th>Ngày mua:</th>
              <th>Số điện thoại:</th>
              <th>Địa chỉ: </th>
              <th>Tổng tiền:</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php 
               $stt = 0; 
            ?>
            @foreach ($orders as $item)
            <?php $stt++; ?>
                <tr>
                    <td>{{ $stt }}</td>
                    <td><a href=" {{ Route('detailCartMana', ['id_orders' => $item->orders_id]) }} ">{{ $item->name_customers }}</a></td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->phone_customers }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->total }} VNĐ.</td>
                    <td><a href=" {{ Route('deleteOrders', ['id_orders' => $item->orders_id]) }} ">Xóa</a></td>
                </tr>
            @endforeach
  
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

