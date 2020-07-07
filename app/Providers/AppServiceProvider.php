<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Channel;
use App\Game;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        
        $channels_english_count = Channel::where('language', 'English')->where('stauts', true)->count();
        $channels_french_count = Channel::where('language', 'French')->where('stauts', true)->count();
        $channels_spanish_count = Channel::where('language', 'Spanish')->where('stauts', true)->count();
        $channels_arabic_count = Channel::where('language', 'Arabic')->where('stauts', true)->count();
        $games = Game::all();
        
        $games_ongoing_count = 0;
        $games_planned_count = 0;
        $games_done_count = 0;
        
        foreach($games as $game)
        {
            if ($game->status() == 'Planned')
            {
                $games_planned_count++;
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

        if ($games_ongoing_count > 0)
        {
            $ongoing_now = true;
        }
        else
        {
            $ongoing_now = false;
        }
        
        $stats_data = collect(['arabic-channels' => $channels_arabic_count, 'french-channels' => $channels_french_count, 'spanish-channels' => $channels_spanish_count, 'english-channels' => $channels_english_count, 'on-going-games' => $games_ongoing_count, 'planned-games' => $games_planned_count, 'done-games' => $games_done_count, 'ongoing_now' => $ongoing_now]);
        
        view()->composer('layouts.front', function ($view) use ($stats_data) {
            $view->with('stats_data', $stats_data);
        });
    }
}
