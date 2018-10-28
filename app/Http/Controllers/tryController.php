<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tries;
use DB;

class tryController extends Controller
{
    
    public function all(Request $request ){
    	// $var=tries::all();
    	$all_data=tries::withTrashed()->paginate();
        $soft_deletes=tries::onlyTrashed()->get();
    	// $var=tries::paginate(5);
    	return view('try',compact('all_data','soft_deletes'));
    }

    public function insert(){
    	$add=new tries;
    	$add->title=request('title');
    	$add->desc=request('desc');
    	$add->add_by=request('add_by');
    	$add->status=request('status');
    	$add->id=request('id');
    	$add->save();
    	return back();
    }

    public function insert_data(){
    	$add=new tries;
    	$add->title=request('title');
    	$add->desc=request('desc');
    	$add->add_by=request('add_by');
    	$add->status=request('status');
    	$add->id=request('id');
    	$add->save();

    	$d=$this->validate(request(),[
    		'title' => 'required',
    		'desc' => 'required',
    		'status' => 'required',
    		'add_by' => 'required',
    	]);
    	
        return back();

    }
	//delete one item
    // public function delete($id){
    // 	$del=tries::find($id);
    // 	$del->delete();
    // 	return back();
    // }

    //delete multible
    public function delete($id=null){
    	if($id !=null){
     		$del=tries::find($id);
    		$del->delete();   		
    	} 
 
    	elseif(request()->has('id') and request()->has('restore'))
    	{
    		tries::whereIn('id',request('id'))->restore();
    	}
   		elseif(request()->has('id') and request()->has('softdelete'))
    	{
    		tries::destroy(request('id'));
    	}  
   		elseif(request()->has('id') and request()->has('fulldelete'))
    	{
    		tries::whereIn('id',request('id'))->ForceDelete(request('id'));
    	}     	   	

    	return back();
    }    
}
