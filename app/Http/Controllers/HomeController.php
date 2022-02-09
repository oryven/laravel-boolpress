<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function create(){

        $categories = Category::all();
        $tags = Tag::all();

    return view('pages.create', compact('categories', 'tags'));
   }

   public function store(Request $request) {

        
    $datas = $request -> validate([
        'title' => 'required|string|min:3',
        'description' => 'required'
    ]);

    // $datas['author'] = Auth::user() -> name;
    $post = Post::make($datas);

    $category = Category::findOrFail($request -> get('category'));
    $tags = Tag::findOrFail($request -> get('tags'));

    $post -> category() -> associate($category);
    
    $post -> save();
    
    $post -> tags() -> attach($tags);

    $post -> save();

    return redirect() -> route('home');
}
}
