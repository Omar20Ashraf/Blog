<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
use View;
class me extends Controller
{
    //
     function test(Request $request){
     	$var=$request->get('action');
     	$var2='neos controller';
    	return view::make('test', ['var'=>$var,'var2'=>$var2]);
    }

     function test2(Request $request){
     	$var=$request->get('action');
     	$var2='neos controller';
    	return view('test', compact('var','var2'));
    }  

     function test3(){
     	$var=request('action');
     	$var2='neos controller';
    	return view('test', compact('var','var2'));
    }  

     function test4(){
     	$var=request()->all();
     	$var2='neos controller';
    	return view('test', compact('var','var2'));
    }

     function test5(Request $request){
     	$var=$request->get('action');
     	$var2='neos controller';
    	return view('test')->with('var',$var)->with('var2',$var2);
    }
        public function all(Request $request){
        $all_news=News::all();
        return view('news',compact('all_news'));
    }            
}

