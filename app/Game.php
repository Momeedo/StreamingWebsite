<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function status () {

      $sd = Carbon::parse($this->start_date);
      $ed = Carbon::parse($this->end_date);
      $now = Carbon::now();
      $status = '';

      $timeUntilGame = $now->diffInSeconds($sd, false);
      // var_dump( $timeUntilGame);
      if ($timeUntilGame < -7200) {
        $status = 'Finished';
        
      } else {
        if ($timeUntilGame >= 0 && $timeUntilGame <= 900) {
          $status = 'On-going';
        } else  {
          $status = 'Planned';
        }
      }
      
      return $status;
    }

    public function timeRemaining () {
      $gameDate =  Carbon::parse($this->start_date);
      $now = Carbon::now();
      $totalDuration = $now->diffInSeconds($gameDate, false);
      return $totalDuration >= 0 ? floor($totalDuration / 3600) . gmdate(":i:s", $totalDuration % 3600) : 0;
    }
    public function fullDate () {
      return Carbon::parse($this->start_date)->utc()->format('d F yy H:i');
    }
    //
    public function channels () {
      return $this->belongsToMany(Channel::class, 'channel_games');
    }

    public function teamA() {
      return $this->hasOne(Team::class, 'id', 'team_a_id');
    }

    public function teamB() {
      return $this->hasOne(Team::class, 'id', 'team_b_id');
    }

    public function competition() {
      return $this->hasOne(Competition::class, 'id', 'competition_id');
    }

    public function location() {
      return $this->hasOne(Location::class, 'id', 'location_id');
    }
}
