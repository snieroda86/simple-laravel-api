<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Calculator;

use App\Models\Post;


class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('pages.home' , ['posts' => $posts ]);
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('pages.single' , compact('post'));
    }
}
