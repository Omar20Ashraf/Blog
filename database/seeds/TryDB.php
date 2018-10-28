<?php

use Illuminate\Database\Seeder;
use App\tries;
class TryDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i=0;$i<10;$i++){
    		
        	$add=new tries;
        	$add->title='Try title'.rand(0,9);
        	$add->add_by= 1;
        	$add->desc='Try desc'.rand(0,9);
        	// $add->content='news content'.rand(0,9);
        	$add->status='active';
        	$add->save();
    	}

    }
}
