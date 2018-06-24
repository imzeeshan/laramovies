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
    }
}
