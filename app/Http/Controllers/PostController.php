<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller 
{
    public function __construct() 
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::select('id', 'title' , 'body')->get();
        return response()->json([
            'status' => 'success',
            'count' => $posts->count(),
            'data' => $posts
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:512',
            'body'  => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $image_path = null;

        if($request->hasFile('featured_image')){
            $image_path = $request->file('featured_image')->store('posts-images');
        }


        $post = $request->user()->posts()->create([
            'title' => $fields['title'],
            'body' => $fields['body'],
            'featured_image' => $image_path
        ]);


        return response()->json([
            'status' => 'success',
            'data'   => $post,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $post
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:512',
            'body'  => 'required|string',
        ]);

        $post = Post::findOrFail($id);

        Gate::authorize('modify', $post);

        $post->update($fields);

        return response()->json([
            'status' => 'success',
            'data'   => $post,
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $post = Post::findOrFail($id);
        Gate::authorize('modify', $post);
        $post->delete();

        return response()->json([
            'status' => 'success',
            'message'   => 'Post with id '.$post->id.' deleted successfully'
        ], 200);

    }
}
