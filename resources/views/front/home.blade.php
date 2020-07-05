@extends('layouts.front')
@section('content')
<section class="banner-section">
	<div class="container">
		<div class="banner-text">
			<h2>Your 24/7 Free Sports Channels Streaming Paradise!</h2>
			@foreach($channels as $channel)
        <div class="button-banner">
          <div id="circle"></div>
          <a href="channel-page.html">
            <img src="{{$channel->logo}}">
          </a>
        </div>
      @endforeach
			
			
		</div><!--banner-text end-->
	</div>
</section><!--banner-section end-->

<section class="vds-main">
	<div class="container">
		<div class="vidz_sec">
			<h3>Highlighted Live Games <a class="h3-seeall" href="{{ url('games') }}">(See All Highlighted Games)</a></h3>
			<div class="vidz_list">
				<div class="row">
					
					<!-- Highlighted game -->
          @forelse($games as $game)
            <div data-toggle="modal" data-target="#channelSelectModal" class="button-game" style="background: url(https://www.fcbarcelona.com/fcbarcelona/photo/2018/06/05/3ba57d13-21d3-4573-8595-20235304d4b1/13-14_wallpaper_camp-nou_001_cat.v1382006897.jpg) no-repeat center center;">
              <div class="highlighted-game">
                <div class="team-logo">
                  <span class="helper"></span>
                  <img src="{{url('/uploads/logos')}}/{{$game->teamA->logo}}">
                </div>
                
                <div class="competition-details">
                  <div class="round-details">
                    <i class="fas fa-futbol"></i>
                    <span>{{$game->competition->name}} 
                          ({{$game->competition->country}}) 
                          Week {{$game->round}}</span>
                  </div>
                  <div class="location-details">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{$game->location->name}}({{$game->location->town}}, {{$game->location->country}})</span>
                  </div>
                  <div class="date-details">
                    <i class="far fa-clock"></i>
                    <span>{{$game->fullDate()}} (in {{$game->timeRemaining()}})</span>
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
                    @foreach($game->channels as $channel)
                      <img src="{{$channel->logo}}">
                    @endforeach                    
                  </div>
                </div>
                
                <div class="team-logo">
                  <span class="helper"></span>
                  <img src="{{url('/uploads/logos')}}/{{$game->teamB->logo}}">
                </div>									
              </div>	
            </div>
          @empty
            <!-- If no Highlighted game -->
						<div class="button-game" id="button-game-none" onclick="window.location.href='#channels-list'">
							<div class="none-highlighted-game">
								<div class="no-game-text">
									<span>No Highlighted Live Games at the time</span>						
								</div>	
								<div class="check-channels-text">
									<span><i class="fas fa-arrow-circle-down"></i> You can still browse Live Channels to find your game <i class="fas fa-arrow-circle-down"></i></span>						
								</div>	
							</div>	
						</div>
						<!-- End If no Highlighted game -->
            @endforelse
					<!-- End Highlighted game -->
					<!-- Highlighted game -->
				</div>
			</div>
		</div>
	</section><!--services-sec end-->
	
	<section class="vds-main" id="channels-list">
		<div class="vidz-row">
			<div class="container">
				<div class="vidz_sec">
					<h3>All Channels <a class="h3-seeall" href="{{ url('channels') }}">(See All)</a></h3>
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