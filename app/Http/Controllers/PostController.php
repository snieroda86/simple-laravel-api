<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
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
        $request->validate([
            'title' => 'required|string|max:512',
            'body'  => 'required|string',
        ]);


        $post = Post::create([
            'title'   => $request->title,
            'body'    => $request->body,
            'user_id' => 3,
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
        $validated = $request->validate([
            'title' => 'required|string|max:512',
            'body'  => 'required|string',
        ]);

        $post = Post::findOrFail($id);

        $post->update([
            'title'   => $validated['title'],
            'body'    => $validated['body'],
            'user_id' => 3,
        ]);

        return response()->json([
            'status' => 'success',
            'data'   => $post, 
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
            'status' => 'success',
            'message'   => 'Post with id '.$post->id.' deleted successfully'
        ], 200);

    }
}
