<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
        	'tag_name' => 'Tình cảm',
        	'tag_quantity' => 5,
        	'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tags')->insert([
        	'tag_name' => 'Trinh thám',
        	'tag_quantity' => 2,
        	'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
        ]);
    }	
}
