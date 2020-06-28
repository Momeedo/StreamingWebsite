<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function isOngoing ($date) {
      $today = date("Y-m-d");
      $today_dt = new DateTime($today);
      return $this->startDate;
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
