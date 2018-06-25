<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(['name' => "Comedy"]);
        DB::table('genres')->insert(['name' => "Sci-Fi"]);
        DB::table('genres')->insert(['name' => "Horror"]);
        DB::table('genres')->insert(['name' => "Romance"]);
        DB::table('genres')->insert(['name' => "Action"]);
        DB::table('genres')->insert(['name' => "Thriller"]);
        DB::table('genres')->insert(['name' => "Drama"]);
        DB::table('genres')->insert(['name' => "Mystery"]);
        DB::table('genres')->insert(['name' => "Crime"]);
        DB::table('genres')->insert(['name' => "Animation"]);
        DB::table('genres')->insert(['name' => "Adventure"]);
        DB::table('genres')->insert(['name' => "Fantasy"]);
        DB::table('genres')->insert(['name' => "Documentary"]);
        DB::table('genres')->insert(['name' => "History"]);
        DB::table('genres')->insert(['name' => "Musical"]);
        DB::table('genres')->insert(['name' => "Sport"]);
        DB::table('genres')->insert(['name' => "War"]);
        DB::table('genres')->insert(['name' => "Family"]);
        DB::table('genres')->insert(['name' => "Biography"]);

    }
}
