@extends('admin-layout')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <div class="main" style="width: 80%; margin: 20px auto;">
        <div class="panel panel-primary">
            <div class="panel-heading">Tổng quan cửa hàng trong tháng 11 qua.</div>
            <div class="panel-body">
              
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Số lượng hóa đơn</th>
              <th>Số lượng sản phẩm</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <tr>
              <td>John</td>
              <td>Doe</td>
              <td>john@example.com</td>
            </tr>
            <tr>
              <td>Mary</td>
              <td>Moe</td>
              <td>mary@mail.com</td>
            </tr>
            <tr>
              <td>July</td>
              <td>Dooley</td>
              <td>july@greatstuff.com</td>
            </tr>
            <tr>
              <td>Anja</td>
              <td>Ravendale</td>
              <td>a_r@test.com</td>
            </tr>
          </tbody>
        </table>
        
        <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
      </div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

            </div>
          </div>
    </div>

@endsection