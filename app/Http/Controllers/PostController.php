<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest();
        $filters = request(['search', 'user', 'category']);
        $filteredPosts = $posts->filter($filters);
        $title ="Latest Post";
        if(request(['category']) ){
            $key = Category::firstWhere('slug',request('category'))->name;
            $title="Category : ". $key ."";
        }

          if(request(['user']) ){
            $key = User::firstWhere('username',request('user'))->name;
            $title="Articles by : ". $key ."";
        }
        if($filteredPosts->count()<1){
            $title ="No post found with that keyword";
        }
        return view("blog.posts", [
            'title' => $title,
            'posts' => $filteredPosts->paginate(7)->withQueryString()
        ]);
    }


    public function create()
    {
        //
    }


    public function store(StorePostRequest $request)
    {
        //
    }


    public function show(Post $post)
    {
        return view("blog.post",[
          'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    
    public function destroy(Post $post)
    {
        //
    }
}
