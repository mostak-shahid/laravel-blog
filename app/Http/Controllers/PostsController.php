<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Post;
use App\Category;
use App\Tag;

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
        $tags = Tag::all();
        if (!$categories->count()){
            Session::flash('info','You must have some categories before attempting to create a post.');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$categories)->with('tags',$tags);
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
            //'slug'=> str_slug($request->title),
            'slug'=> strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title))),
            'featured'=>'uploads/posts/'.$featured_new_name,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
        ]);
        $post->tags()->attach($request->tags);
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
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
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
        $this->validate($request,[
            'title'=>'required|max:255',
            'featured'=>'image',
            'content'=>'required',
            'category_id'=>'required',
        ]);
        $post = Post::find($id);
        if ($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name); 
            $post->featured =  'uploads/posts/'.$featured_new_name;        
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        Session::flash('success','Your post has been updated.');
        return redirect()->route('posts');
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
