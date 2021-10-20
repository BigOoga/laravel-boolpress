<?php

//l Created using php "artisan make:controller Admin/PostController --model=Post" for CRUD scaffolding

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        //l When returning the view, the controller needs to point to the exact view
        //l it does not see the prefix from web.php
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dummy = new Post();
        return view('admin.posts.create', ['post' => $dummy]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => ['required', 'max:50', 'unique:posts'],
                'content' => ['required'],

            ],
            //l To specify custom error messages, add an array parameter to validate()
            //l The Error bag will be automatically made available to the page
            //l You can access the messages of the Error bag with the directive
            //l @error('name_of_property') {{ $message }}
            //l {{ $message }}
            //l @enderror
            [
                'title.required' => 'Title can\'t be empty',
                'content.required' => 'Content can\'t be empty',
                'title.max' => 'Title must be less than 50 characters',
            ]
        );

        //l The $errors variable is automatically made available to all views and is an instance of the MessageBag class.



        $data = $request->all();
        $newPost = new Post();
        $newPost->fill($data);
        $newPost->slug = Str::of($newPost->title)->slug('-');
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //l show an edit form
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        //l requires 'fillable' in Post model
        $post->update($data);

        //l redirect to the just updated post
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::find($post->id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', 'Item successfully deleted.');
    }
}
