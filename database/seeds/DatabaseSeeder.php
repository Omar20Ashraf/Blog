<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(NewsDB::class);
        // $this->call(TryDB::class);
        $this->call(TagsTableSeeder::class);
    }
}
