<!DOCTYPE html>
<!--
Template Name: NobleUI - Admin & Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: You must have a valid license purchased only from above link or https://themeforest.net/user/nobleui/portfolio/ in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ @$page_title ? $page_title.' - Admin '.env('APP_NAME') : 'Admin '.env('APP_NAME')  }}</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
	<!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('images/logo-bonkid-simple.png') }}" />
  @yield('head')
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header" >
        <a href="#" class="sidebar-brand">
          <img src="{{ asset('images/logo-bonkid.png') }}" alt="" style="width:150px">
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link">
              <i class="link-icon" data-feather="package"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Products</li>
          
          <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.product.index') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Product</span>
            </a>
          </li>
          <li class="nav-item nav-category">Transaksi</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Orders</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<form class="search-form">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i data-feather="search"></i>
								</div>
							</div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form>
					<ul class="navbar-nav">
						
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="{{ asset('images/logo-bonkid-simple.png') }}" alt="profile">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										<img src="{{ asset('images/logo-bonkid-simple.png') }}" alt="">
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0">{{auth()->user()->name}}</p>
										<p class="email text-muted mb-3">{{auth()->user()->email}}</p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
												<i data-feather="log-out"></i>
												<span>Log Out</span>
											</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->
      @yield('content')
      

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				
			</footer>
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/js/template.js') }}"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
	<!-- end custom js for this page -->
  @yield('scripts')
</body>
</html>    