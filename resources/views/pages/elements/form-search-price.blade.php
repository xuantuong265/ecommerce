<div class="panel group">
        <div class="panel panel-primary">
        <div class="panel-heading">Tìm kiếm theo giá:</div>
            <form action="{{ Route('search_price') }}" method="post">
                {{csrf_field()}}
                <div class="panel-body">
                    <div class="form-group">
                        <label for="my-input">Từ: </label>
                        <input id="my-input" class="form-control" type="text" name="start" required="required">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Đến: </label>
                        <input id="my-input" class="form-control" type="text" name="end" required="required">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
   </div> 