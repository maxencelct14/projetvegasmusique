<?php

namespace Database\Seeders;

use App\Models\Musique;
use App\Models\Playlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Playlist::factory()->count(10)->create();
        $ids = range(1, 10);
        Musique::factory()->count(30)->create()->each(function ($musique) use($ids)
        {
            shuffle($ids);
            $musique->playlists()->attach(array_slice($ids, 0, rand(1, 5)));
        });
    }
}
