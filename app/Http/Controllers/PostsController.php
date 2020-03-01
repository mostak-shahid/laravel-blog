<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if (!$categories->count()){
            Session::flash('info','You must have some categories before attempting to create a post.');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255',
            'featured'=>'required|image',
            'content'=>'required',
            'category_id'=>'required',
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);
        
        $post = Post::create([
            'title'=>$request->title,
            'slug'=> str_slug($request->title),
            'featured'=>'uploads/posts/'.$featured_new_name,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
        ]);
        // return redirect()->back();
        return view('admin.posts.index')->with('posts',Post::all());

        // dd($featured_new_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flush('info', 'The post has been trashed.');
        return redirect()->back();
    }
    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }
    public function remove($id){
        // $post = Post::find($id);
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flush('info', 'The post has been deleted.');
        return redirect()->back();        
    }
    public function restore($id){
        // $post = Post::find($id);
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flush('success', 'The post has been restored.');
        return redirect()->back();        
    }
}
