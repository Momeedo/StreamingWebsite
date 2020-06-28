<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function status ($st, $et) {
      $today = Carbon::now();
      $sd = Carbon::parse($st);
      $ed = Carbon::parse($et);


      if ($today > $sd && $today <= $ed) {
        $status = 'On-going';
      } else if ($today >= $ed) {
        $status = 'Finished';
      } else if ($sd > $today) {
        $status = 'Scheduled';
      }
      return $status;
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
      return $this->hasOne(Competition::class, 'id');
    }

    public function location() {
      return $this->hasOne(Location::class, 'id');
    }
}
