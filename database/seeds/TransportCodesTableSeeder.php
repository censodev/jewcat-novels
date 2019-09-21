<?php

use Illuminate\Database\Seeder;

class TransportCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transport_codes')->insert([
        	'code_name' => 'ADSECVII20190730',
        	'code_quantity' => 10,
        	'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
