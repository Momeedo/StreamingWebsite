@extends('layouts.front')
@section('content')
<section class="mn-sec full_wdth_single_video">
	<div class="container">
		<div class="vid-pr">
			<iframe SRC="{{$link}}" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH=100% HEIGHT=100% allowfullscreen></iframe>
		</div><!--vid-pr end-->
		<div class="row">
			<div class="col-lg-9">
				<div class="mn-vid-sc single_video">
					<div class="vid-1">
						<div class="vid-info">
							<h3>{{$channel->name}} ({{$channel->language}})</h3>
							<div class="info-pr">
								<span><i class="fas fa-eye"></i> {{$channel->views}} views</span>
								<div class="form-separation"></div><div class="form-separation"></div>
								<!-- <span>Tags:&nbsp;&nbsp;</span><span style="color:#4a90e2;">#Live #BeIN #{{$channel->language}}</span> -->
								<div class="clearfix"></div>
							</div><!--info-pr end-->
						</div><!--vid-info end-->
					</div><!--vid-1 end-->
					<div class="abt-mk">
						<div class="info-pr-sec">							
							<!-- <ul class="chan_cantrz">
								<li>
									<a href="#" title="" class="donate">Donate to support the website</a>
								</li>
							</ul>-->
							<ul class="df-list">
								<li>
									<button data-toggle="tooltip" data-placement="top" title="Share">
										<i class="icon-share"></i>
									</button>
								</li>
								<li>
									<button data-toggle="tooltip" data-placement="top" title="Report Video">
										<i class="icon-flag"></i>
									</button>
								</li>
							</ul><!--df-list end-->
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div><!--abt-mk end-->
					<div class="info-pr-sec">
						<center><h3>Highlighted Games of the Day on this Channel<br><a class="h3-seeall" href="/#channels-list">(See All)</a></h3></center>
						<div class="form-separation"></div>
						
            @forelse($channel->games as $game)
              @if ($game->status() == 'Planned')
              <div data-toggle="modal" onclick="selectGame({{$game->channels}})" data-target="#channelSelectModal" class="button-game" style="background: url('{{url('/uploads/locations')}}/{{$game->location->image}}') no-repeat center center;">
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
              @else
                <!-- If no Highlighted game -->
                <div class="button-game" id="button-game-none">
                  <div class="none-highlighted-game">
                    <div class="no-game-text">
                      <span>No Highlighted Live Games at the time</span>						
                    </div>	
                  </div>	
                </div>
                <!-- End If no Highlighted game -->
              @endif
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
						
						
						<div class="clearfix"></div>
					</div>
				</div><!--mn-vid-sc end--->
			</div><!---col-lg-9 end-->
			<div class="col-lg-3">
				<div class="sidebar">
					<div class="vidz-prt">
						<h3 class="sm-vidz">More Channels</h3>
						
						<div class="clearfix"></div>
					</div><!--vidz-prt end-->
					<div class="videoo-list-ab">
            <!-- One Channel -->
            @foreach($moreChannels as $c)
              <div class="videoo">
                <div class="vid_thumbainl">
                  <a href="channel-page.html" title="">
                    <img src="{{url('/uploads/channels')}}/{{$c->banner}}" alt="">
                    <span class="vid-lang">{{$c->language}}</span>
                    <!-- If game is on -->
                      @foreach($c->games as $game)
                        @if ($game->status() == 'On-going')
                        <!-- If game is on -->
                          <span class="vid-game">
                            <span>
                              <i>Now playing</i><br>
                              <img 
                              class="teamlogo" 
                              src="{{url('/uploads/logos')}}/{{$game->teamA->logo}}"> 
                              {{$game->teamA->name}} &times; {{$game->teamB->name}} 
                              <img class="teamlogo" src="{{url('/uploads/logos')}}/{{$game->teamB->logo}}">
                            </span>
                          </span>
                        <!-- End if game is on -->
                        @endif
                      @endforeach
                    <!-- End if game is on -->
                    <span class="vid-live"><span><i class="fas fa-circle" style="font-size:10px;"></i> Live</span></span>
                  </a>	
                </div><!--vid_thumbnail end-->
                <div class="video_info">
                  <h3><a href="channel-page.html" title="">{{$c->name}}</a></h3>
                  <span><i class="fas fa-eye"></i> {{$c->views}}</span>
                </div>
              </div><!--videoo end-->
            @endforeach
						<!-- End One Channel>
							
							
						</div><!--videoo-list-ab end-->
					</div><!--side-bar end-->
				</div>
			</div>
		</div>
	</section><!--mn-sec end-->
@endsection