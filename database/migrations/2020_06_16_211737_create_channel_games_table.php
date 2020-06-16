<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('channel_id');
            $table->unsignedBigInteger('game_id');

            // add foreign keys
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_games');
    }
}
