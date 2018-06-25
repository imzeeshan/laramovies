<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Zeeshan",
            'last_name'  => "Chawdhary",
             'email'     => 'imzeeshanc@gmail.com',
            'password'   => bcrypt('admin'),
            'role_id'    => 1
        ]);

        DB::table('users')->insert([
            'first_name' => "Anthony",
            'last_name'  => "Russo",
             'email'     => 'anthony@gmail.com',
            'password'   => bcrypt('user'),
            'role_id'    =>  DB::table('roles')->where('name', 'Director')->pluck('id')->first(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Joe",
            'last_name'  => "Russo",
             'email'     => 'joe@gmail.com',
            'password'   => bcrypt('user'),
            'role_id'    =>  DB::table('roles')->where('name', 'Director')->pluck('id')->first(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Christopher",
            'last_name'  => "Markus",
             'email'     => 'christopher@gmail.com',
            'password'   => bcrypt('user'),
            'role_id'    =>  DB::table('roles')->where('name', 'Writer')->pluck('id')->first(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Stephen",
            'last_name'  => "McFeely",
             'email'     => 'stephen@gmail.com',
            'password'   => bcrypt('user'),
            'role_id'    =>  DB::table('roles')->where('name', 'Writer')->pluck('id')->first(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Robert",
            'last_name'  => "Downey Jr.",
            'email'     => 'robert@gmail.com',
            'password'   => bcrypt('user'),
            'role_id'    =>  DB::table('roles')->where('name', 'Actor')->pluck('id')->first(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Chris",
            'last_name'  => "Hemsworth",
            'email'     => 'chris@gmail.com',
            'password'   => bcrypt('user'),
            'role_id'    =>  DB::table('roles')->where('name', 'Actor')->pluck('id')->first(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Mark",
            'last_name'  => "Ruffalo",
            'email'     => 'mark@gmail.com',
            'password'   => bcrypt('user'),
            'role_id'    =>  DB::table('roles')->where('name', 'Actor')->pluck('id')->first(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Test",
            'last_name'  => "Test",
            'email'     => 'test@gmail.com',
            'password'   => bcrypt('user'),
            'role_id'    =>  DB::table('roles')->where('name', 'Crew')->pluck('id')->first(),
        ]);




    }
}
