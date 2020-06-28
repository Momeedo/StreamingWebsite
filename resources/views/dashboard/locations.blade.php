@extends('layouts.dashboard')
@section('content')
<!-- Main Content -->
<div id="content">
	
	<!-- Topbar -->
	<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
		
		<!-- Sidebar Toggle (Topbar) -->
		<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
		</button>
		
		<!-- Topbar Search -->
		<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
				<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button class="btn btn-primary" type="button">
						<i class="fas fa-search fa-sm"></i>
					</button>
				</div>
			</div>
		</form>
		
		<!-- Topbar Navbar -->
		<ul class="navbar-nav ml-auto">
			
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
				<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-search fa-fw"></i>
				</a>
			</li>
			
			
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
					<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
				</a>
				<!-- Dropdown - User Information -->
				<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
						<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
						Logout
					</a>
				</div>
			</li>
			
		</ul>
		
	</nav>
	<!-- End of Topbar -->
	
	<!-- Begin Page Content -->
	<div class="container-fluid">
		
		<a href="add-location.html" class="btn btn-success btn-icon-split" style="margin-bottom:20px;">
			<span class="icon text-white-50">
				<i class="fas fa-plus-square"></i>
			</span>
			<span class="text">Add a Location</span>
		</a>	        
		
		
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
            <div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">All Locations</h6>
			</div>
            <div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>ID</th>
								<th>Stadium</th>
								<th>Preview</th>
								<th>Town</th>
								<th>Country</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Stadium</th>
								<th>Preview</th>
								<th>Town</th>
								<th>Country</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td>5</td>
								<td>Camp Nou</td>
								<td><img width="200px" src="https://www.fcbarcelona.com/fcbarcelona/photo/2018/06/07/fde8dc92-66b3-48f3-9996-22008151b267/DanHlskWsAADKM0.jpg"></td>
								<td>Barcelona</td>
								<td>Spain</td>
								<td> 
									<div class="text-center">
										<a href="#" class="btn btn-primary btn-icon-split">
											<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
											</span>
										</a> 
									</div>
								</td>
								<td> 
									<div class="text-center">
										<a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal">
											<span class="icon text-white-50">
												<i class="fas fa-trash"></i>
											</span>
										</a> 
									</div>
								</td>
							</tr>
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
	
	<!-- /.container-fluid -->
	
</div>
<!-- End of Main Content -->
@endsection