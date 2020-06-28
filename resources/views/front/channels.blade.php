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
					<h3 class="fl-head"><i class="icon-language"></i> Language</h3>
					<ul class="lnks">
						<li><a href="#" title="">English</a></li>
						<li><a href="#" title="">French</a></li>
						<li><a href="#" title="">Arabic</a></li>
					</ul>
				</div><!--filter end-->
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="icon-playlist"></i> Status</h3>
					<ul class="lnks">
						<li><a href="#" title="">Live</a></li>
					</ul>
				</div><!--filter end-->
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="icon-star"></i> Sort by</h3>
					<ul class="lnks">
						<li><a href="#" title="">Name <i class="icon-cancel"></i></a></li>
						<li><a href="#" title="">Views count</a></li>
					</ul>
				</div><!--filter end-->
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="icon-watch_later"></i> Highlighted game on-going</h3>
					<ul class="lnks">
						<li><a href="#" title="">Yes</a></li>
					</ul>
				</div><!--filter end-->
			</div>
		</div>
	</div>
</section><!--filter-sec end-->

<section class="vds-main" id="channels-list">
	<div class="vidz-row">
		<div class="container">
			<div class="vidz_sec">
				<div class="vidz_list">
					<div class="row">
						
						<!-- One Channel -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="channel-page.html" title="">
										<img src="https://im.haberturk.com/2019/10/24/ver1572176319/2534061_810x458.jpg" alt="">
										<span class="vid-lang">French</span>
										<!-- If game is on -->
										<span class="vid-game">
											<span>
												<i>Now playing</i><br><img class="teamlogo" src="https://upload.wikimedia.org/wikipedia/sco/thumb/4/47/FC_Barcelona_%28crest%29.svg/1200px-FC_Barcelona_%28crest%29.svg.png"> FC Barcelona &times; Real Madrid <img class="teamlogo" src="https://upload.wikimedia.org/wikipedia/en/thumb/5/56/Real_Madrid_CF.svg/1200px-Real_Madrid_CF.svg.png">
											</span>
										</span>
										<!-- End if game is on -->
										<span class="vid-live"><span><i class="fas fa-circle" style="font-size:10px;"></i> Live</span></span>
									</a>	
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="channel-page.html" title="">BeIN Sports HD 1</a></h3>
									<span><i class="fas fa-eye"></i> 686K</span>
								</div>
							</div><!--videoo end-->
						</div>
						<!-- End One Channel -->
						
						<!-- One Channel -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="channel-page.html" title="">
										<img src="https://i.pinimg.com/originals/ba/28/f2/ba28f253defee79639649e992f3757f7.jpg" alt="">
										<span class="vid-lang">French</span>
										<!-- If game is on -->
										<!-- End if game is on -->
										<span class="vid-live"><span><i class="fas fa-circle" style="font-size:10px;"></i> Live</span></span>
									</a>	
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="channel-page.html" title="">RMC Sports 1</a></h3>
									<span><i class="fas fa-eye"></i> 686K</span>
								</div>
							</div><!--videoo end-->
						</div>
						<!-- End One Channel -->
						
					</div>
				</div><!--vidz_list end-->
			</div><!--vidz_videos end-->
		</div>
	</div><!--vidz-row end-->
	
</section><!--vds-main end-->
@endsection