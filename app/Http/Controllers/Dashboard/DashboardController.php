<?php
	
	namespace App\Http\Controllers\Dashboard;
	
	use App\Http\Controllers\Controller;
	use App\Channel;
	use App\Team;
	use App\Competition;
	use App\Message;
	use App\Game;
	use DB;
	
	class DashboardController extends Controller
	{
		public function __construct(){
			$this->middleware('auth');
		}
		
		public function index(){
        $games = Game::all();
        $most_viewed_channel = Channel::orderBy('views', 'desc')->first();
        $channels_count = Channel::all()->count();
        $channels_active_count = Channel::where('stauts', 1)->count();
        $competitions_count = Competition::all()->count();
        $games_count = Game::all()->count();
        $teams_count = Team::all()->count();
        $total_views = Channel::all()->sum('views');
        $unread_messages_count = Message::where('is_read', 0)->count();
        $games_ongoing_count = 0;
        $games_planned_count = 0;
        $games_planned_today_count = 0;
        $games_done_count = 0;
        
        foreach($games as $game)
        {
            if ($game->status() == 'Planned')
            {
                $games_planned_count++;
                if ($game->start_date->isToday())
                {
                    $games_planned_today_count++;
                }
            }
            elseif ($game->status() == 'On-going')
            {
                $games_ongoing_count++;
            }
            else
            {
                $games_done_count++;
            }
        }
        
        $stats_data = collect(['most_viewed_channel' => $most_viewed_channel, 'on-going-games' => $games_ongoing_count, 'planned-games' => $games_planned_count, 'planned-games-today' => $games_planned_today_count, 'done-games' => $games_done_count, 'channels_count' => $channels_count, 'competitions_count' => $competitions_count,  'games_count' => $games_count,  'teams_count' => $teams_count,  'unread_messages_count' => $unread_messages_count, 'channels_active_count' => $channels_active_count, 'total_views' => $total_views]);	
			return view('dashboard.home', ['stats_data' => $stats_data]);
		}
	}
