<?php

use App\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = new Genre();
        $genre->name ="Action";
        $genre->save();
        $genre1 = new Genre();
        $genre1->name ="Adventure";
        $genre1->save();
        $genre2 = new Genre();
        $genre2->name ="Sci-Fi";
        $genre2->save();
       
    }
}
