<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['name' => "Admin"]);
        DB::table('roles')->insert(['name' => "Actor"]);
        DB::table('roles')->insert(['name' => "Actress"]);
        DB::table('roles')->insert(['name' => "Director"]);
        DB::table('roles')->insert(['name' => "Producer"]);
        DB::table('roles')->insert(['name' => "Music Director"]);
        DB::table('roles')->insert(['name' => "Crew"]);
        DB::table('roles')->insert(['name' => "Writer"]);
        DB::table('roles')->insert(['name' => "User"]);
    }
}
