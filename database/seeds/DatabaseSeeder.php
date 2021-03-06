<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
        	AuthorsTableSeeder::class,
        	NovelsTableSeeder::class,
            TagsTableSeeder::class,
            TransportCodesTableSeeder::class
        ]);
    }
}
