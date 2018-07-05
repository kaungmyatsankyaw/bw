<?php

use Illuminate\Database\Seeder;
//use DB;

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
            'name' => 'Ko Pyae',
            'username' => 'Ko Pyae',
            'password' => bcrypt('123456'),
            'address' => 'Yangon',
            'phone_number'=>'123456',
            'admin_level' => 1,
        ]);
    }
}
