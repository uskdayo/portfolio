<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $blogs = \App\Blog::orderBy('created_at', 'desc')->paginate(20);
        return view('index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = new Blog;
        $items = Item::all()->pluck('name', 'id');
        return view('new', ['blog' => $blog, 'items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        if ($request->hasFile('thefile')) {
            $user = \Auth::user();
            $blog = new Blog;
            $blog->title = request('title');
            $blog->content = request('content');
            $filename=$request->file('thefile')->store('public'); 
            $blog->image=str_replace('public/','',$filename); 
            $blog->item_id = request('item_id');
            $blog->user_id = $user->id;
            $blog->save();
            return redirect()->route('blog.detail', ['id' => $blog->id]);
        }else{
            $user = \Auth::user();
            $blog = new Blog;
            $blog->title = request('title');
            $blog->content = request('content');
            $blog->user_id = $user->id;
            $blog->item_id = request('item_id');
            $blog->save();
            return redirect()->route('blog.detail', ['id' => $blog->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $user = \Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = "";
        }
        return view('show', ['blog' => $blog, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $items = Item::all()->pluck('name', 'id');
        return view('new', ['blog' => $blog, 'items' => $items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id, Blog $blog)
    {
        if ($request->hasFile('thefile')) {
            $blog = Blog::find($id);
            $blog->title = request('title');
            $blog->content = request('content');
            $filename=$request->file('thefile')->store('public'); 
            $blog->image=str_replace('public/','',$filename);
            $blog->item_id = request('$item->id');
            $blog->save();
            return redirect()->route('blog.detail', ['id' => $blog->id]);
        }else{
            $blog = Blog::find($id);
            $blog->title = request('title');
            $blog->content = request('content');
            $blog->item_id = request('$item->id');
            $blog->save();
            return redirect()->route('blog.detail', ['id' => $blog->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('/blogs');
    }
}
