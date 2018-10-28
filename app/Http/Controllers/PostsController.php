<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Post;
use App\Tag;
use Image;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Every request must be authneticated
        // $this->middleware('auth');

        //only
        // $this->middleware('auth',['only'=>]);

        //expect
         $this->middleware('auth',['except'=>['index','show'] ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $posts=Post::all();
        // $posts=Post::orderBy('created_at','DESC')->get();

        $posts=Post::orderBy('created_at','DESC')->paginate('20');
        $tags=Tag::all();

        return view('posts.index',compact('posts','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags=Tag::all();
        return view('posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Access request Data
        // $posttitle=$request->input('title');
        // return $posttitle;

        //Simple Validation
        $this->validate(request() ,[
            'title' =>'required',
            'body'  =>'required',
            'photo' =>'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $user=Auth::user();

        $posts=new Post;
        $posts->title=$request->input('title');
        $posts->body=$request->input('body');
        $time=date('YmdHis');
        $posts->slug=str_replace(' ','-',strtolower($posts->title)). '-' . $time;
        $posts->user_id=$user->id;

        //upload the photo if any
        if($request->hasFile('photo')){
            $photo=$request->photo;

            //to avoid the override if you upload photo with the same name
            // like    the previous 

            //instead of getClientOriginalName you can use //getClientOriginalExtention
            $filename=time().'-'.$photo->getClientOriginalName();
            $location=public_path('images/posts/'.$filename);

            //if you dont use the image library
            //$photo->move($location);//tmp
            Image::make($photo)->resize(800,400)->save($location);

            $posts->photo=$filename;

        }
        $posts->save();

        $posts->tags()->sync($request->tags);
        return redirect('/posts')->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $post=Post::where('slug',$slug)->first();
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $post=Post::where('slug',$slug)->first();
        $post = Post::find($id);

        //Current user id
        $userId=Auth::id();

        if($post['user_id'] !== $userId){
            return redirect('/posts')->with('error','this is not your post');
        }
        $tags=Tag::all();
        return view('posts.edit',compact('post','tags'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate(request() ,[
            'title' =>'required',
            'body'  =>'required',
            'photo' =>'image|mimes:jpg,png,jpeg|max:2048'
        ]);
    
        $post= Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        // $post->photo=$request->input('photo'); 

        //Current user id
        $userId=Auth::id();
        if($post->user_id !== $userId){
            return redirect('/posts')->with('error','this is not your post');
        }
       
        $post->save();   
        $post->tags()->sync($request->tags);
        return redirect('/posts/'.$post->slug)->with('success','Post updated successfully');                    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::find($id);
        
        $userId=Auth::id();        
        if($post->user_id !== $userId){
            return redirect('/posts')->with('error','this is not your post');
        }        

        $post->delete();

        return redirect('/posts')->with('success','Post deleted successfully');

    }
}
