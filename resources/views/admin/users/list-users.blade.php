@extends('admin-layout')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
              <th>Email: </th>
              <th>Địa chỉ: </th>
              <th>Giới tính: </th>
              <th>Số điện thoại</th>
            </tr>
          </thead>
          <tbody id="myTable">
              
             <?php $stt = 0 ?>
            @foreach ($datas as $key => $value)
              <?php $stt++ ?>
              <tr>
                  <td>{{ $stt }}</td>
                  <td>{{ $value->customers_name }}</td>
                  <td>{{ $value->customers_email }}</td>
                  <td>{{ $value->customers_address }}</td>
                  <td>{{ $value->customers_sex }}</td>
                  <td>{{ $value->customers_phone }}</td>
                <td>
                 
                </td>
              </tr>
                    
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    // $(document).ready(function(){
    //   $("#myInput").on("keyup", function() {
    //     var value = $(this).val().toLowerCase();
    //     $("#myTable tr").filter(function() {
    //       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //     });
    //   });
    // });
    </script>

@endsection