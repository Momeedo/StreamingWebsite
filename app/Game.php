<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public function channels () {
      return $this->belongsToMany(Tags::class, 'channel_games');
    }

    public function teamA() {
      return $this->hasOne(Teams::class, 'team_a_id');
    }

    public function teamB() {
      return $this->hasOne(Teams::class, 'team_b_id');
    }
}
