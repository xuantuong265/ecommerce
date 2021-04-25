<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="{{URL::to('admin/dashboard')}}" class="logo">
            admin
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->
    
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <li>
                <input type="text" id="myInput" class="form-control search" placeholder=" Search">
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="{{asset('public/admin/images/crush.jpg')}}" style="width: 50px; height: 40px">
                    <span class="username">
                        @if (Session::has('admin_name'))
                            {{Session::get('admin_name')}}
                        @endif
                    </span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="{{ Route('logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
                    <li><a href="{{ Route('add') }}"><i class="fa fa-key"></i>Add</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
           
        </ul>
        <!--search & user info end-->
    </div>
    </header>