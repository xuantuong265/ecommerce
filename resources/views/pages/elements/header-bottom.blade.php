<div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{ Route('trangchu') }}" class="active">Home</a></li>
                        <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                @foreach ($category as $item)
                                    @if ($item->category_status == 1)
                                        <li><a href="{{ URL::to('/products-list/'.$item->id) }}">{{ $item->category_name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li> 
                        <li><a href="404.html">Contact</a></li>
                        <li><a href=" {{ Route('blog') }} ">Blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">

            <form class="form-inline" action="{{ URL::to('/search') }}" method="post">
                    {{csrf_field()}}
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="width: 150px !important;" name="search" required="required">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>