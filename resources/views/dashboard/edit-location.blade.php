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
		
		<!-- Topbar Navbar -->
		<ul class="navbar-nav ml-auto">
			<!-- Nav Item - User Information -->
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
					<img class="img-profile rounded-circle" src="{{ asset('/dashboard/img/boss.png') }}">
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
		
		@if($errors->any())
		<div class="col-lg-12 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <b><i class="fas fa-exclamation-triangle"></i> Error</b><br>{{$errors->first()}}
                </div>
            </div>
        </div>
        @endif
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit {{old('name', $location->name)}}</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<tbody>
                          <form method="post" action="{{ route('location-update', $location->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
							<tr>
								<th>Stadium Name</th>
								<td><input type="text" style="width:100%;" name="name" value="{{old('name', $location->name)}}"></td>
							</tr>
							<tr>
								<th>Town</th>
								<td><input type="text" style="width:100%;" name="town" value="{{old('town', $location->town)}}"></td>
							</tr>
							<tr>
								<th>Country</th>
								<td><input type="text" style="width:100%;" name="country" value="{{old('country', $location->country)}}"></td>
							</tr>
							<tr>
								<th>Preview</th>
								<td><img style="width:20%;padding-right:10px;" src="/uploads/locations/{{old('image', $location->image)}}"><input type="file" style="width:80%;" name="image" accept="image/png, image/jpeg, image/gif"></td>
							</tr>
							<tr >
								<td colspan="3">
									<button type="submit" class="btn btn-success btn-icon-split" style="margin-bottom:20px;" onclick="loadingscreen()">
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
<!-- End of Main Content -->
@endsection