@extends('layouts.front')
@section('content')
<section class="filter-sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="icon-filter"></i> Filter</h3>
				</div><!--filter end-->						
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="fas fa-calendar"></i> Status</h3>
					<ul class="lnks">
						<li><a href="#" title="">Planned</a></li>
						<li><a href="#" title="">On-going</a></li>
						<li><a href="#" title="">Completed</a></li>
					</ul>
				</div><!--filter end-->
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="fas fa-futbol"></i> Sport</h3>
					<ul class="lnks">
						<li><a href="#" title="">Basketball</a></li>
						<li><a href="#" title="">Football</a></li>
						<li><a href="#" title="">Handball</a></li>
						<li><a href="#" title="">Tennis</a></li>
						<li><a href="#" title="">Volleyball</a></li>
						<li><a href="#" title="">Other</a></li>
					</ul>
				</div><!--filter end-->
			</div>
			
			<div class="col-lg-6 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="fas fa-trophy"></i> Competition</h3>
					<ul class="lnks">
						<li><a href="#" title="">La Liga (Spain)</a></li>
						<li><a href="#" title="">Some other competition (from database order by name)</a></li>
					</ul>
				</div><!--filter end-->
			</div>
		</div>
	</div>
</section><!--filter-sec end-->

<section class="vds-main">
	<div class="container">
		<div class="vidz_sec">
			<div class="vidz_list">
				<div class="row">
					
					<!-- Highlighted game -->
					<div data-toggle="modal" data-target="#channelSelectModal" class="button-game" style="background: url(https://www.fcbarcelona.com/fcbarcelona/photo/2018/06/05/3ba57d13-21d3-4573-8595-20235304d4b1/13-14_wallpaper_camp-nou_001_cat.v1382006897.jpg) no-repeat center center;">
						<div class="highlighted-game">
							<div class="team-logo">
								<span class="helper"></span>
								<img src="https://upload.wikimedia.org/wikipedia/sco/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png">
							</div>
							
							<div class="competition-details">
								<div class="round-details">
									<i class="fas fa-futbol"></i>
									<span>La Liga (Spain) Week 12 - Football</span>
								</div>
								<div class="location-details">
									<i class="fas fa-map-marker-alt"></i>
									<span>Camp Nou (Barcelona, Spain)</span>
								</div>
								<div class="date-details">
									<i class="far fa-clock"></i>
									<span>November 5th 2020 18:00 GMT (in 5h30min)</span>
								</div>	
								
								<div class="team-names">
									<div class="team-name">
										<span>FC Barcelona</span>
									</div>
									<div class="middle-part">
										<div class="top-middle-part"></div>
										<div class="versus-symbol">
											<span>&times;</span>
										</div>
										<div class="bottom-middle-part"><span>Planned</span></div>
									</div>
									<div class="team-name">
										<span>Real madrid</span>
									</div>
								</div>	
								
								<div class="channels-details">
									<span class="helper"></span>
									<img src="https://cdn.bein.net/fr/wp-content/uploads/2018/05/beINSPORTSHD1.png">
									<img src="https://cdn.bein.net/fr/wp-content/uploads/2018/05/beINSPORTSHD1.png">
									<img src="https://cdn.bein.net/fr/wp-content/uploads/2018/05/beINSPORTSHD1.png">
									<img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3a/Fox_Sports_Logo.svg/1200px-Fox_Sports_Logo.svg.png">
								</div>
							</div>
							
							<div class="team-logo">
								<span class="helper"></span>
								<img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/56/Real_Madrid_CF.svg/1200px-Real_Madrid_CF.svg.png">
							</div>									
						</div>	
					</div>
					<!-- End Highlighted game -->
					<!-- Highlighted game -->
					<div data-toggle="modal" data-target="#channelSelectModal" class="button-game" style="background: url(https://www.fcbarcelona.com/fcbarcelona/photo/2018/06/05/3ba57d13-21d3-4573-8595-20235304d4b1/13-14_wallpaper_camp-nou_001_cat.v1382006897.jpg) no-repeat center center;">
						<div class="highlighted-game">
							<div class="team-logo">
								<span class="helper"></span>
								<img src="https://upload.wikimedia.org/wikipedia/sco/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png">
							</div>
							
							<div class="competition-details">
								<div class="round-details">
									<i class="fas fa-futbol"></i>
									<span>La Liga (Spain) Week 12 - Basketball</span>
								</div>
								<div class="location-details">
									<i class="fas fa-map-marker-alt"></i>
									<span>Camp Nou (Barcelona, Spain)</span>
								</div>
								<div class="date-details">
									<i class="far fa-clock"></i>
									<span>November 5th 2020 18:00 GMT (in 5h30min)</span>
								</div>
								
								<div class="team-names">
									<div class="team-name">
										<span>FC Barcelona</span>
									</div>
									
									<div class="middle-part">
										<div class="top-middle-part"></div>
										<div class="versus-symbol">
											<span>&times;</span>
										</div>
										<div class="bottom-middle-part"><span class="highlighted-live"><span><i class="fas fa-circle"></i> Live</span></div>
										</div>
										
										<div class="team-name">
											<span>Real madrid</span>
										</div>
									</div>	
									
									<div class="channels-details">
										<span class="helper"></span>
										<img src="https://cdn.bein.net/fr/wp-content/uploads/2018/05/beINSPORTSHD1.png">
										<img src="https://cdn.bein.net/fr/wp-content/uploads/2018/05/beINSPORTSHD1.png">
										<img src="https://cdn.bein.net/fr/wp-content/uploads/2018/05/beINSPORTSHD1.png">
										<img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3a/Fox_Sports_Logo.svg/1200px-Fox_Sports_Logo.svg.png">
									</div>
								</div>
								
								<div class="team-logo">
									<span class="helper"></span>
									<img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/56/Real_Madrid_CF.svg/1200px-Real_Madrid_CF.svg.png">
								</div>									
							</div>	
						</div>
						<!-- End Highlighted game -->
						
						<!-- If no Highlighted game -->
						<div class="button-game" id="button-game-none" onclick="window.location.href='channels.html'">
							<div class="none-highlighted-game">
								<div class="no-game-text">
									<span>No Highlighted Games at the time</span>						
								</div>	
								<div class="check-channels-text">
									<span>You can still browse Live Channels to find your game</span>						
								</div>	
							</div>	
						</div>
						<!-- End If no Highlighted game -->
					</div>
				</div>
			</div>
		</div>
	</section><!--services-sec end-->
@endsection