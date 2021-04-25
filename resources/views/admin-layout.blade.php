
<!DOCTYPE html>
<head>

    @include('admin.elements.head')

</head>
<body>
<section id="container">
<!--header start-->
    @include('admin.elements.header')
<!--header end-->
<!--sidebar start-->
<aside>
    @include('admin.elements.sliderbar')
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		
			@yield('admin_content')
					
    </section>
    
   
</section>
<!--main content end-->
</section>
    
@include('admin.elements.jscrip')

</body>
</html>
