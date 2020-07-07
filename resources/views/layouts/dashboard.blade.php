<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Dashboard - nfoot.net</title>
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/front/images/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/front/images/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/front/images/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/front/images/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/front/images/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/front/images/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/front/images/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/front/images/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/front/images/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/front/images/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/front/images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/front/images/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/front/images/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('/front/images/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('/front/images/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
		<link href="{{ asset('/dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="{{ asset('/dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/dashboard/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
		<link href="{{ asset('/dashboard/vendor/bootstrap-select2/select2.css') }}" rel="stylesheet">
		<link href="{{ asset('/dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
	</head>
	<body id="page-top">
		<!-- Page Wrapper -->
		<div id="wrapper">
			
			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
				
				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('manage') }}">
					<div class="sidebar-brand-icon">
						<img src="{{ url('/front/images/favicon/apple-icon-72x72.png') }}" />
					</div>
					<div class="sidebar-brand-text mx-3">Dashboard</div>
				</a>
				
				<!-- Divider -->
				<hr class="sidebar-divider my-0">
				
				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="{{ url('manage') }}">
						<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
				</li>
                <li class="nav-item active">
					<a class="nav-link" href="{{ url('/') }}">
						<i class="fas fa-fw fa-home"></i>
					<span>Website</span></a>
				</li>
				
				<!-- Divider -->
				<hr class="sidebar-divider">
				
				<!-- Heading -->
				<div class="sidebar-heading">
					Pages
				</div>
				
				<!-- Nav Item -->
				<li class="nav-item">
					<a class="nav-link" href="{{ url('manage/games') }}">
						<i class="fas fa-calendar-alt"></i>
					<span>Games</span></a>
				</li>
				<!-- Nav Item -->
				<li class="nav-item">
					<a class="nav-link" href="{{ url('manage/channels') }}">
						<i class="fas fa-tv"></i>
					<span>Channels</span></a>
				</li>
				<!-- Nav Item -->
				<li class="nav-item">
					<a class="nav-link" href="{{ url('manage/teams') }}">
						<i class="fas fa-futbol"></i>
					<span>Teams</span></a>
				</li>
				<!-- Nav Item -->
				<li class="nav-item">
					<a class="nav-link" href="{{ url('manage/competitions') }}">
						<i class="fas fa-trophy"></i>
					<span>Competitions</span></a>
				</li>	
				<!-- Nav Item -->
				<li class="nav-item">
					<a class="nav-link" href="{{ url('manage/locations') }}">
						<i class="fas fa-map-pin"></i>
					<span>Locations</span></a>
				</li>				
				<!-- Divider -->
				<hr class="sidebar-divider">	 
				
				<!-- Heading -->
				<div class="sidebar-heading">
					Contact
				</div>
				
				<!-- Nav Item -->
				<li class="nav-item">
					<a class="nav-link" href="{{ url('manage/messages') }}">
						<i class="fas fa-envelope"></i>
					<span>Messages</span></a>
				</li>	  
				
				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">
				
				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
				
			</ul>
			<!-- End of Sidebar -->
			
			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
				
				<!-- Content -->
				@yield('content')
				<!-- End of Content -->
				
				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; 2020</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
				
			</div>
			<!-- End of Content Wrapper -->
			
		</div>
		<!-- End of Page Wrapper -->
		
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>
		
		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
					</div>
				</div>
			</div>
		</div>
        <div id="loading">
          <img id="loading-image" src="{{ asset('/dashboard/img/Spinner.svg') }}" alt="Loading..." />
        </div>
		<!-- Bootstrap core JavaScript-->
		<script src="{{ asset('/dashboard/vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- Core plugin JavaScript-->
		<script src="{{ asset('/dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
		<!-- Custom scripts for all pages-->
		<script src="{{ asset('/dashboard/js/sb-admin-2.min.js') }}"></script>
		<!-- Page level plugins -->
		<!--<script src="{{ asset('/dashboard/vendor/chart.js/Chart.min.js') }}"></script>-->
		<!-- Page level custom scripts -->
		<!--
        <script src="{{ asset('/dashboard/js/demo/chart-area-demo.js') }}"></script>
		<script src="{{ asset('/dashboard/js/demo/chart-pie-demo.js') }}"></script>
        -->
		<script src="{{ asset('/dashboard/vendor/bootstrap-select2/select2.min.js') }}"></script>
    @yield('js')
    <script>
    function loadingscreen () {
        $('#loading').show();
    }
    </script>
		
	</body>
</html>
