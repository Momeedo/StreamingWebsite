<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		@yield('meta')
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <meta name="keywords" content="live,streaming,hd,football,sport,free,bein sports,alkaas,sky sports,rmc sport,unlimited,arabic,french,english,spanish,en direct,gratuit,match,illimité" />
        <meta name="description" content="Watch free Live Streaming of sports channels in HD and with no interruptions (beIN Sports, SKy Sports, RMC Sport, AlKaas, Movistar and more!)" />

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
									<img class="main-logo" src="{{ url('/front/images/logo.png') }}" alt="">
								</a>
							</div><!--menu_logo end-->
                            <!-- Search Form -->
                            <!--
							<div class="search_form">
								<form>
									<input type="text" name="search" placeholder="Search Channels">
									<button type="submit">
										<i class="icon-search"></i>
									</button>
								</form>
							</div>
                            -->
							<ul class="controls-lv">
								<li class="user-log">
									<div class="user-ac-img">
                                        @auth
										<i class="fas fa-user-check" style="color: #3cb878;"></i>
                                        @endauth
                                        @guest
                                        <i class="fas fa-user-times"></i>
                                        @endguest
									</div>
									<div class="account-menu">
                                        @auth
										<h4>USER <span class="usr-status">Online</span></h4>
                                        @endauth
                                        @guest
										<h4><span class="usr-status" style="background-color: #b83c3c;">Logged Out</span></h4>
                                        @endguest
										<div class="sd_menu">
											<ul class="mm_menu">
                                                @guest
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
                                                @endguest
                                                @auth
												<li>
													<span>
														<i class="icon-logout"></i>
													</span>
													<a href="{{ url('logout') }}" title="">Sign out</a>
												</li>
                                                @endauth
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
							<a href="{{ url('/#english-channels') }}" title="">English Channels <sup>({{$stats_data->get('english-channels')}})</sup></a>
						</li>
						<li>
							<span>
								<i class="fas fa-tv"></i>
							</span>
							<a href="{{ url('/#french-channels') }}" title="">French Channels <sup>({{$stats_data->get('french-channels')}})</sup></a>
						</li>
						<li>
							<span>
								<i class="fas fa-tv"></i>
							</span>
							<a href="{{ url('/#spanish-channels') }}" title="">Spanish Channels <sup>({{$stats_data->get('spanish-channels')}})</sup></a>
						</li>
						<li>
							<span>
								<i class="fas fa-tv"></i>
							</span>
							<a href="{{ url('/#arabic-channels') }}" title="">Arabic Channels <sup>({{$stats_data->get('arabic-channels')}})</sup></a>
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
							<a href="{{ url('games?status=on-going') }}" title="">On-going Games <sup
                            @if ($stats_data->get('ongoing_now'))
                                style="color:red;"
                            @endif
                            >({{$stats_data->get('on-going-games')}})</sup></a>
						</li>
						<li>
							<span>
								<i class="fas fa-calendar-day"></i>
							</span>
							<a href="{{ url('games?status=scheduled') }}" title="">Planned Games <sup>({{$stats_data->get('planned-games')}})</sup></a>
						</li>
						<li>
							<span>
								<i class="fas fa-calendar-check"></i>
							</span>
							<a href="{{ url('games?status=completed') }}" title="">Completed Games <sup>({{$stats_data->get('done-games')}})</sup></a>
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
                <!-- Social Links -->
				<!--
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
					</ul>
				</div>
                -->
				<div class="dd_menu"></div>
			</div><!--side_menu end-->
			
			
			@yield('content')
			
			
			<section class="more_items_sec text-center">
				<div class="container">
                <div style="text-align:center;padding:1em 0;"> <h3><a style="text-decoration:none;"><span style="color:gray;">Current local time</span><br />Europe/London</a></h3> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Europe/London" width="100%" height="115" frameborder="0" seamless></iframe></div>
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
					<div class="modal-body" style="max-height:500px;overflow-y:scroll;" id="channels_place">

					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
        
		<!-- Donation Modal-->
		<div class="modal fade" id="donateSelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Donate to support the website</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body" style="max-height:500px;overflow-y:scroll;" id="channels_place">
						<!-- Content -->
						<div class="channel-selection">
                            <span>Donate via <i class="fab fa-bitcoin"></i> Bitcoin (BTC) to the following address:<br><b style="color:#007bff">1Anzxz3RzLCSpChhZi8Fud7WapBo35Qc4A</b></span>
                            <br><br>
							<a><img class="no-outline" style="max-width: 300px;" src="{{ url('/front/images/btc_qr.jpg?v=1') }}"></a>
                            <br><br>
                            <span>Donating helps us upgrading our servers and add more channels! <i class="fas fa-grin-alt"></i></span>
                        </div>
						<!-- Content -->
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>	
		<script src="{{ asset('/front/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/front/js/popper.js') }}"></script>
		<script src="{{ asset('/front/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/front/js/flatpickr.js') }}"></script>
    <script src="{{ asset('/front/js/script.js') }}"></script>
    <script  type="text/javascript">
      function selectGame (channels) {
        $('.channel-selection').remove()
        Array.from(channels).forEach(c => {
          const channelSelectDiv = document.createElement('div')
          const channelPage = document.createElement('a')
          const channelImg = document.createElement('img')
          $(channelSelectDiv).addClass('channel-selection')
          $(channelPage).attr('href', `/channel/${c.id}`)
          $(channelImg).attr('src', `{{url('/uploads/channels')}}/${c.logo}`)
          $(channelImg).attr('class', `selection-img`)
          $(channelPage).append(channelImg)
          $(channelSelectDiv).append(channelPage)

          $('#channels_place').append(channelSelectDiv)
        })
      }
    </script>
	</body>
</html>															