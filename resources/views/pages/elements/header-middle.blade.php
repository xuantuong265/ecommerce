<div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="{{ Route('trangchu') }}"><img src="{{asset('public/customers/images/bizweb-logo-new.png')}}" style="width: 172px; height: 50px"lt="" /></a>
                </div>
                <div class="btn-group pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            USA
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Canada</a></li>
                            <li><a href="#">UK</a></li>
                        </ul>
                    </div>
                    
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            DOLLAR
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Canadian Dollar</a></li>
                            <li><a href="#">Pound</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ Route('listCart') }}"><i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-danger" style="position: absolute; top: -12px; background-color: red;">{{ Cart::count() }}</span>
                            <span class="sr-only">unread messages</span></a>
                        </li>
                        @if (Session::has('customers_name'))
                            <li><a href="http://"><i class="fa fa-user"></i> {{ Session::get('customers_name') }}</a></li>
                            <li><a href="{{ Route('customers_logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        @else
                            <li><a href="{{ Route('formLogin') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                            <li><a href="{{ Route('formRegistration') }}"><i class="fa fa-lock"></i> Registration</a></li>
                        @endif

                        @if (Session::has('admin_name'))
                            <li><a href="{{ Route('dashboard') }}"><i class="fas fa-users-cog"></i> Trang quản trị</a></li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>