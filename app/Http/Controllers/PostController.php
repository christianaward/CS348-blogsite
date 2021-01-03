<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|max:120',
        ]);

        $post = new Post;
        $post->body = $validated['body'];
        if ($request->file('fileToUpload') != null) {
            $post->image = str_replace("public/", "storage/", $request->file('fileToUpload')->store('public'));
        }
        else {
            $post->image = null;
        }
        $post->user_id = Auth::user()->id;
        $post->save();

        session()->flash('message', 'Post created successfully.');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show' , ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->authLevel == 1 or Auth::user()->username == $post->user->username) {
            return view('posts.edit' , ['post' => $post]);
        }
        else {
            session()->flash('message', 'You do not have sufficient permissions to view this.');
            return redirect()->route('posts.index');
        }
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
        $validated = $request->validate([
            'body' => 'required|max:120',
        ]);

        $post = Post::find($id);

        $post->body = $validated['body'];
        $post->save();

        session()->flash('message', 'Post updated successfully.');
        return redirect()->route('posts.index');
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

        session()->flash('message', 'Post deleted successfully.');
        return redirect()->route('posts.index');
    }
}
