<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function index(){
        $posts = Post::all();
        return view('pages.index', compact('posts'));
    }
    public function create(){
        return view('pages.create');
    }
    public function store(Request $request){
        $data = $request -> validate(
            [
                'title'=>'required|string',
                'author'=>'required|string',
                'description'=>'required|string',
                'date'=>'required|date',
            ]
        );
        $posts = Post::create($data);
        return redirect()->route('posts');

    }
}