<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $items = Item::all();
        $items = \App\Item::orderBy('created_at', 'desc')->paginate(20);
        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item;
        $categories = Category::all()->pluck('name', 'id');
        return view('items.new', ['item' => $item, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $item = new Item;
        $user = \Auth::user();
        $item->name = request('name');
        $item->category_id = request('category_id');
        $filename=$request->file('thefile')->store('public'); 
        $item->image=str_replace('public/','',$filename); 
        $item->user_id = $user->id;
        $item->save();
        return redirect()->route('items.show', ['id' => $item->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $user = \Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = "";
        }
        return view('items.show', ['item' => $item, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all()->pluck('name', 'id');
        return view('items.edit', ['item' => $item, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Item $item)
    {
        $item = Item::find($id);
        $item->name = request('name');
        $item->category_id = request('category_id');
        $filename=$request->file('thefile')->store('public'); 
        $item->image=str_replace('public/','',$filename);
        $item->save();
        return redirect()->route('items.show', ['id' => $item->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/items');
    }
}
