<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusiquePlaylist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('musique_playlist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('musique_id');
            $table->unsignedBigInteger('playlist_id');
            $table->timestamps();
            $table->foreign('musique_id')
                ->references('id')
                ->on('musiques')
                ->onDelete('cascade');
            $table->foreign('playlist_id')
                ->references('id')
                ->on('playlists')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musique_playlist');
    }
}
