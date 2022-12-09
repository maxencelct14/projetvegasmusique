<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable=['titreplay'];

    public function musiques(){
//retourne la collection de musiques pour une playlist
        return $this->belongsToMany(Musique::class);
    }
}
