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
		
		
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit Team</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<tbody>
              <form method="post" action="{{ route('team-update', $team->id) }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <tr>
                  <th>Team Name</th>
                  <td><input type="text" style="width:100%;" name="name" value="{{old('name', $team->name)}}"></td>
                </tr>
                <tr>
                  <th>Country</th>
                  <td><input type="text" style="width:100%;" name="country" value="{{old('country', $team->country)}}"></td>
                </tr>
                <tr>
                  <th>Logo</th>
                  <td><img style="width:20%;padding-right:10px;" src="/uploads/logos/{{old('logo', $team->logo)}}"><input type="file" style="width:80%;" name="logo"></td>
                </tr>
                <tr >
                  <td colspan="3">
                    <button class="btn btn-success btn-icon-split" type="submit" value="Edit">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                      </span>
                      <span class="text">Edit</span>
                    </button>
                  </td>
                </tr>
              </form>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		
	</div>
	
	
	<!-- /.container-fluid -->
	
</div>

@section('js')
<script></script>
@endsection
<!-- End of Main Content -->
@endsection