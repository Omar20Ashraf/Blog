<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

//used to generate the time stamb
use Carbon\Carbon;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tags')->insert([
        	'tag'=>'Java',
        	'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tags')->insert([
        	'tag'=>'php',
        	'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tags')->insert([
        	'tag'=>'web Development',
        	'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tags')->insert([
        	'tag'=>'AMS',
        	'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
         DB::table('tags')->insert([
        	'tag'=>'Laravel',
        	'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);                       
    }
}
