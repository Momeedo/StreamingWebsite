<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'channels';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $fillable = [
      'banner', 'logo', 'name', 'link', 'country', 'language', 'status'
    ];

    public function tags () {
      return $this->belongsToMany(Tags::class, 'channel_tags');
    }
    
    public function games () {
      return $this->belongsToMany(Games::class, 'channel_games');
    }
}
