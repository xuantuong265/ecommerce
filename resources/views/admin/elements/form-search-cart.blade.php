<form action=" {{ Route('searchCart') }} " method="post">
    @csrf
    <table>
        <tr>
            <td><label>Ngày: </label></td>
            <td>
                <div class="form-group">
                    <input type="date" class="form-control" name="ngaydau">
                </div>
            </td>
            <td><label>đến Ngày:</label></td>
            <td>
                <div class="form-group">
                    <input type="date" class="form-control" name="ngaycuoi">
                </div>
            </td>
            <td>
                <button class="btn btn-success" type="submit" name="ok" style="margin-left: 20px;margin-bottom: 20px;">Lọc</button>
            </td>
        </tr>
    </table>
</form>