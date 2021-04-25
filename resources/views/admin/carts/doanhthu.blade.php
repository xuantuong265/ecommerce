@extends('admin-layout')
@section('admin_content')

<h3 style="text-align: center; margin-bottom: 30px; ">Quản lý doanh thu</h3>
<div class="form">
    @include('admin.elements.form-search-doanhthu') 
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
                <th>Ngày mua:</th>
                <th>Số đơn hàng:</th>
                <th>Tổng tiền:</th>
              </tr>
        </thead>
        <tbody id="myTable">
          <?php 
            $stt = 0; 
            $tonghoadon = 0;
            $tong = 0;
          ?>
         @foreach ($doanhthu as $item)
         <?php $stt++; ?>
             <tr>
                <td>{{$stt }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->sodonhang }}
                      <?php  $tonghoadon += $item->sodonhang; ?>
                </td>
                <td>{{ number_format($item->tongtien) }}VND.
                      <?php  $tong += $item->tongtien; ?>
                </td>
             </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="tong" style="width: 40%; margin-top: 50px;">
   <ul class="list-group">
    <li class="list-group-item active">Tổng kết</li>
    <li class="list-group-item">Tổng số hóa đơn: <?php echo($tonghoadon) ?></li>
    @foreach ($products as $value)
      <li class="list-group-item">Tổng số sản phẩm bán được: {{ $value->tongsanpham }}</li>
    @endforeach
    <li class="list-group-item">Tổng tiền: <?php echo(number_format($tong)) ?> VND</li>
  </ul>
</div>
</div>




@endsection

