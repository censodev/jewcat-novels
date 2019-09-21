<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'role' => 2,
        	'name' => 'Bui Viet Phuong',
        	'email' => 'admin@gmail.com',
        	'password' => Hash::make('123456'),
            'image_url' => 'admin.jpg',
            'address' => 'Ha noi',
            'phone_number' => '0123456789',
            'account_type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456'),
            'image_url' => 'admin.jpg',
            'address' => 'Ha noi',
            'phone_number' => '0123456789',
            'account_type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
