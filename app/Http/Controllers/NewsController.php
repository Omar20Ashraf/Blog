<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use DB;
class NewsController extends Controller
{
    
    public function all(Request $request){
        $all_news=News:: withTrashed()->paginate();
        $soft_deletes=News::onlyTrashed()->get();
        return view('news',compact('all_news','soft_deletes'));
    }  

    public function insert(){
    	$add=new News;
    	$add->title=request('title');
    	$add->desc=request('desc');
    	$add->add_by=request('add_by');
    	$add->status=request('status');
    	$add->save();
    	return back();
    }  

    public function insert_news(){
    	//firstOrCreate == firstOrNew == updateOrCreate
    	$data=$this->validate(request(),[
    		'title' => 'required',
    		'desc' => 'required',
    		'status' => 'required',
    		'add_by' => 'required',
    	],[],[
    		'title' => trans('admin.title'),
    		'desc' => trans('admin.desc'),
    		'status' => trans('admin.status'),
    		'add_by' => trans('admin.add_by'),
    	]);
    	// DB::table('news')->insert($data);
    	// News::create($data);
    	News::create([
    		'title' => request('title'),
    		'desc' => request('desc'),
    		'status' => request('status'),
    		'add_by' => request('add_by')
   			 ]);
    	// session()->put('message1','News REcord Added successfuly');
    	// session()->push('message',['key1'=>'val1']);
    	 return back();
    	// return redirect('news');
    }

    public function delete($id=null){
    	// News::find($id)->delete();
    	if($id != null){
    	$dl=News::find($id);
    	$dl->delete();
    	} elseif(request()->has('id') and request()->has('restore')){
    		News::whereIn('id',request('id'))->restore();
    	} elseif(request()->has('id') and request()->has('force')){
    		News::whereIn('id',request('id'))->forceDelete();
    	} elseif(request()->has('id') and request()->has('fulldelete')){
    		News::destroy(request('id'));
    	}
    	return back();
    }
}
