<div id="sidebar" class="nav-collapse">
    <!-- sidebar menu start-->
    <div class="leftside-navigation">
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="{{URL::to('admin/dashboard')}}">
                    <i class="fas fa-home"></i>
                    <span>Trang chủ</span>
                </a>
            </li>

            <li>
                <a class="active" href="{{ Route('trangchu') }}">
                    <i class="fas fa-home"></i>
                    <span>Web</span>
                </a>
            </li>
      
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Danh mục sản phẩm</span>
                </a>
                <ul class="sub">
                <li><a href="{{ Route('add_category') }}">Thêm danh mục sản phẩm</a></li>
                    <li><a href="{{ Route('dashboard') }}">Xem tất cả danh mục</a></li>
                </ul>
            </li>
           
            <li>
                <a href=" {{ Route('doanhThu') }} ">
                    <i class="far fa-money-bill-alt"></i>
                    <span>Doanh thu</span>
                </a>
            </li>
            <li>
                <a href="{{ Route('listCartMana') }}">
                    <i class="fas fa-wallet"></i>
                    <span>Đơn hàng</span>
                </a>
            </li>

            <li>
                <a href="{{ Route('listUsers') }}">
                    <i class="fas fa-users"></i>
                    <span>Quản lý khách hàng</span>
                </a>
            </li>
            <li>
                <a href="{{ Route('listComments') }}">
                    <i class="fas fa-comments"></i>
                    <span>Quản lý bình luận</span>
                </a>
            </li>
            
            
        </ul>            
    </div>
    <!-- sidebar menu end-->
</div>