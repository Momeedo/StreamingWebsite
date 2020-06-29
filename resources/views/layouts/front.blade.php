<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		@yield('meta')
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="icon" href="{{ asset('/front/favicon.ico') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/animate.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/flatpickr.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/fontello.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/fontello-codes.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/thumbs-embedded.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/responsive.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/color.css') }}">
		<link href="{{ asset('/front/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	</head>
	
	
	<body>
		<div class="wrapper hp_1" id="top">
			<header>
				<div class="top_bar">
					<div class="container">
						<div class="top_header_content">
							<div class="menu_logo">
								<a href="#" title="" class="menu">
									<i class="icon-menu"></i>
								</a>
								<a href="{{ url('/') }}" title="" class="logo">
									<img src="images/logo.png" alt="">
								</a>
							</div><!--menu_logo end-->
							<div class="search_form">
								<form>
									<input type="text" name="search" placeholder="Search Channels">
									<button type="submit">
										<i class="icon-search"></i>
									</button>
								</form>
							</div><!--search_form end-->
							<ul class="controls-lv">
								<li class="user-log">
									<div class="user-ac-img">
										<img src="images/resources/user-img.png" alt="">
									</div>
									<div class="account-menu">
										<h4>USER <span class="usr-status">Online</span></h4>
										<div class="sd_menu">
											<ul class="mm_menu">
												<li>
													<span>
														<i class="icon-user"></i>
													</span>
													<a href="{{ url('login') }}" title="">Login</a>
												</li>
												<li>
													<span>
														<i class="icon-plus"></i>
													</span>
													<a href="{{ url('register') }}" title="">Register</a>
												</li>
												<li>
													<span>
														<i class="icon-logout"></i>
													</span>
													<a href="{{ url('logout') }}" title="">Sign out</a>
												</li>
											</ul>
										</div><!--sd_menu end-->
									</div>
								</li>
							</ul><!--controls-lv end-->
							<div class="clearfix"></div>
						</div><!--top_header_content end-->
					</div>
				</div><!--header_content end-->
			</header><!--header end-->
			
			<div class="side_menu">
				<div class="sd_menu">
					<ul class="mm_menu">
						<li>
							<span>
								<i class="fas fa-home"></i>
							</span>
							<a href="{{ url('/') }}" title="">Home</a>
						</li>
					</ul>
				</div><!--sd_menu end-->
				<div class="sd_menu">
					<h3><a href="{{ url('channels') }}">Channels</a></h3>
					<ul class="mm_menu">
						<li>
							<span>
								<i class="fas fa-tv"></i>
							</span>
							<a href="{{ url('channels?lang=english') }}" title="">English Channels <sup>(5)</sup></a>
						</li>
						<li>
							<span>
								<i class="fas fa-tv"></i>
							</span>
							<a href="{{ url('channels?lang=french') }}" title="">French Channels <sup>(2)</sup></a>
						</li>
						<li>
							<span>
								<i class="fas fa-tv"></i>
							</span>
							<a href="{{ url('channels?lang=arabic') }}" title="">Arabic Channels <sup>(7)</sup></a>
						</li>
					</ul>
				</div>
				<div class="sd_menu">
					<h3><a href="{{ url('games') }}">Highlighted Games</a></h3>
					<ul class="mm_menu">
						<li>
							<span>
								<i class="fas fa-calendar"></i>
							</span>
							<a href="{{ url('games?status=on-going') }}" title="">On-going Games <sup>(1)</sup></a>
						</li>
						<li>
							<span>
								<i class="fas fa-calendar-day"></i>
							</span>
							<a href="{{ url('games?status=scheduled') }}" title="">Planned Games <sup>(2)</sup></a>
						</li>
						<li>
							<span>
								<i class="fas fa-calendar-check"></i>
							</span>
							<a href="{{ url('games?status=completed') }}" title="">Completed Games <sup>(10)</sup></a>
						</li>
					</ul>
				</div>
				<div class="sd_menu">
					<ul class="mm_menu">
						<li>
							<span>
								<i class="fas fa-envelope"></i>
							</span>
							<a href="{{ url('contact') }}" title="">Contact Us</a>
						</li>
						<li>
							<span>
								<i class="fas fa-user-lock"></i>
							</span>
							<a href="{{ url('privacy-policy') }}" title="">Privacy Policy</a>
						</li>
					</ul>
				</div><!--sd_menu end-->
				
				<div class="sd_menu bb-0">
					<ul class="social_links">
						<li>
							<a href="#" title="">
								<i class="icon-facebook-official"></i>
							</a>
						</li>
						<li>
							<a href="#" title="">
								<i class="icon-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#" title="">
								<i class="icon-instagram"></i>
							</a>
						</li>
					</ul><!--social_links end-->
				</div><!--sd_menu end-->
				<div class="dd_menu"></div>
			</div><!--side_menu end-->
			
			
			@yield('content')
			
			
			<section class="more_items_sec text-center">
				<div class="container">
					<a class="top-page-button" href="#top" title="Top Page">
						<i class="fas fa-arrow-alt-circle-up"></i>
					</a>
				</div>
			</section><!--more_items_sec end-->
		</div><!--wrapper end-->
		
		<!-- Channel Selection Modal-->
		<div class="modal fade" id="channelSelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Choose your channel</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body" style="max-height:500px;overflow-y:scroll;">
						<!-- One Channel -->
						<div class="channel-selection">
							<a href="channel-page.html"><img src="https://cdn.bein.net/fr/wp-content/uploads/2018/05/beINSPORTSHD1.png"></a>
						</div>
						<!-- One Channel -->
						<!-- End One Channel -->
						<div class="channel-selection">
							<a href="channel-page.html"><img src="https://cdn.bein.net/fr/wp-content/uploads/2018/05/beINSPORTSHD1.png"></a>
						</div>
						<!-- One Channel -->
						<!-- End One Channel -->
						<div class="channel-selection">
							<a href="channel-page.html"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3a/Fox_Sports_Logo.svg/1200px-Fox_Sports_Logo.svg.png"></a>
						</div>
						<!-- End One Channel -->
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>		
		<script src="{{ asset('/front/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/front/js/popper.js') }}"></script>
		<script src="{{ asset('/front/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/front/js/flatpickr.js') }}"></script>
		<script src="{{ asset('/front/js/script.js') }}"></script>
	</body>
</html>															