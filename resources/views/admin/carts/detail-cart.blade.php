@extends('admin-layout')
@section('admin_content')

<h3 style="text-align: center; margin-bottom: 30px; ">Chi tiết đơn hàng</h3>
<table style="margin-bottom: 50px;">
   
    </table>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tiền</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php $stt = 0; ?>
            @foreach ($detail_orders as $item)
                <?php $stt++; ?>
                <tr>
                    <td>{{ $stt }}</td>
                    <td>{{ $item->products_id }}</td>
                    <td>{{ $item->amounts }}</td>
                    <td>{{ number_format($item->price) }} vnđ.</td>
                    <td>{{ number_format($total = $item->amounts*$item->price) }} vnđ.</td>
                    <td><a href=" {{ Route('deleteDetailCart', [$item->id]) }} ">Xóa</a></td>
                </tr>
            @endforeach
            
        </tbody>
    </table>


@endsection