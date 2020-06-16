<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    public function channels () {
      return $this->belongsToMany(Tags::class, 'channel_tags');
    }
}
