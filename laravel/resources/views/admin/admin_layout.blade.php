<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin</title>

		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="shortcut icon" href="{{asset('/backend/image/icon.png')}}">
		<link rel="stylesheet" href="{{asset('/backend/css/form.css')}}">
		<link rel="stylesheet" href="{{asset('/backend/css/mystyle.css')}}">

		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  			<div class="container-fluid">
    			<div class="collapse navbar-collapse" id="navbarSupportedContent">
      				<ul class="navbar-nav me-auto mb-4 mb-lg-0">
				        <li class="nav-item">
				          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
				        </li>
        				<li class="nav-item dropdown">
          					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            					User
          					</a>
				          	<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					            <li><a class="dropdown-item" href="{{route('admin.user.create')}}">Add User</a></li>
					            <li><a class="dropdown-item" href="{{route('admin.user.show')}}">List User</a></li>
				          	</ul>
        				</li>
        				<li class="nav-item dropdown">
          					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            					Category
          					</a>
				          	<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					            <li><a class="dropdown-item" href="{{route('admin.categories.create')}}">Add User</a></li>
					            <li><a class="dropdown-item" href="{{route('admin.categories.show')}}">List User</a></li>
				          	</ul>
        				</li>
        				<li class="nav-item dropdown">
          					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            					Product
          					</a>
				          	<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					            <li><a class="dropdown-item" href="{{route('admin.product.create')}}">Add Product</a></li>
					            <li><a class="dropdown-item" href="{{route('admin.product.show')}}">List Product</a></li>
				          	</ul>
        				</li>
      				</ul>
      				<ul class="navbar-nav d-flex">
      					<li  class="nav-item">
      						<a class="nav-link" href="#">
      							<li>
									@if (Auth::check())
											{{Auth::User()->username}}
									@endif
								</li>
      						</a>
      						<a class="nav-link" href="{{Auth::logout()}}">
      							<li>
									Logout
								</li>
      						</a>
      					</li>
      				</ul>
    			</div>
    		</div>
		</nav>
		<section class="admin_content">
			@yield('admin_content')
		</section>
	</body>
</html>
