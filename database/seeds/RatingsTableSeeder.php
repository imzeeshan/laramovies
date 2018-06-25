<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert(['name' => "PG-13"]);
        DB::table('ratings')->insert(['name' => "G"]);
        DB::table('ratings')->insert(['name' => "PG"]);
        DB::table('ratings')->insert(['name' => "R"]);
        DB::table('ratings')->insert(['name' => "NC-17"]);
    }
}
