@extends('layouts.front')
@section('title')
Highlighted Games - nfoot.net, The Live Sports Channels Streaming Platform!
@endsection
@section('meta')
<meta property="og:title" content="Games - nfoot.net, The Live Sports Channels Streaming Platform!">
<meta property="og:description" content="Watch free Live Streaming of sports channels in HD and with no interruptions (beIN Sports, SKy Sports, RMC Sport, AlKaas, Movistar and more!)">
<meta property="og:image" content="{{url('/front/images/website_header.jpg')}}">
<meta property="og:url" content="https://nfoot.net">
<meta name="twitter:title" content="Games - nfoot.net, The Live Sports Channels Streaming Platform!">
<meta name="twitter:description" content="Watch free Live Streaming of sports channels in HD and with no interruptions (beIN Sports, SKy Sports, RMC Sport, AlKaas, Movistar and more!)">
<meta name="twitter:image" content="{{url('/front/images/website_header.jpg')}}">
<meta name="twitter:card" content="{{url('/front/images/website_header.jpg')}}">
@endsection
@section('content')
<!--
<section class="filter-sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="icon-filter"></i> Filter</h3>
				</div>					
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="fas fa-calendar"></i> Status</h3>
					<ul class="lnks">
						<li><a href="#" title="">Planned</a></li>
						<li><a href="#" title="">On-going</a></li>
						<li><a href="#" title="">Completed</a></li>
					</ul>
				</div>
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
				</div>
			</div>
			
			<div class="col-lg-6 col-md-4 col-sm-4 col-6 full_wdth">
				<div class="filter">
					<h3 class="fl-head"><i class="fas fa-trophy"></i> Competition</h3>
					<ul class="lnks">
						<li><a href="#" title="">La Liga (Spain)</a></li>
						<li><a href="#" title="">Some other competition (from database order by name)</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
-->

<section class="vds-main">
	<div class="container">
		<div class="vidz_sec">
			<div class="vidz_list">
				<div class="row">
					@forelse($games as $game)
            <div data-toggle="modal"
                onclick="selectGame({{$game->channels}})"
                data-target="#channelSelectModal" class="button-game" style="background: url('{{url('/uploads/locations')}}/{{$game->location->image}}') no-repeat center center;">
              <div class="highlighted-game">
                <div class="team-logo">
                  <span class="helper"></span>
                  <img src="{{url('/uploads/logos')}}/{{$game->teamA->logo}}">
                </div>
                
                <div class="competition-details">
                  <div class="round-details">
                    <i class="fas fa-futbol"></i>
                    <span>{{$game->competition->name}} 
                          ({{$game->competition->country}}) {{$game->round}}</span>
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
                      <span>{{$game->teamA->name}}</span>
                    </div>
                    <div class="middle-part">
                      <div class="top-middle-part"></div>
                      <div class="versus-symbol">
                        <span>&times;</span>
                      </div>
                      @if($game->status() == 'Planned')
                      <div class="bottom-middle-part"><span>Planned</span></div>
                      @elseif($game->status() == 'On-going')
                      <div class="bottom-middle-part"><span class="highlighted-live"><span><i class="fas fa-circle"></i> Live</span></div>
                      @else
                      <div class="bottom-middle-part"><span>Done</span></div>
                      @endif
                    </div>
                    <div class="team-name">
                      <span>{{$game->teamB->name}}</span>
                    </div>
                  </div>	
                  
                  <div class="channels-details">
                    <span class="helper"></span>
                    @foreach($game->channels as $channel)
                      <img src="{{url('/uploads/channels')}}/{{$channel->logo}}">
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
				</div>
			</div>
		</div>
	</section><!--services-sec end-->
@endsection