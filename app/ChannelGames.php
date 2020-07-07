<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Game;
use App\Channel;

class ChannelGames extends Model
{
    protected $fillable = ['*'];
    //
    public function game() {
      return $this->hasOne(Game::class, 'id');
    }

    public function channel() {
      return $this->hasOne(Channel::class, 'id');
    }
}
