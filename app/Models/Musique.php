<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musique extends Model
{
    use HasFactory;
    protected $fillable=['titremus','notemus'];
    public function playlists(){
//retourne la collection de musiques pour une playlist
        return $this->belongsToMany(Playlist::class);
    }
}
