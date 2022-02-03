<?php

namespace App\Http\Controllers;

use App\Models\DashboardPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get()->where('user_id', auth()->user()->id);

        return view('dashboard.post.index', [
            'posts' => $posts,

        ]);
    }

    public function show(Post $post)
    {

        return view('dashboard.post.show', [
            'post' => $post,
        ]);
    }



    public function create()
    {
        return view('dashboard.post.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:55|unique:posts',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        $validated['slug'] = Str::slug($request->title, '-');
        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('images');
        }
        Post::create($validated);

        return redirect('dashboard/posts')->with('success', "New Post successfully created");
    }

    public function edit(Post $post)
    {
        return view('dashboard.post.edit', [
            'post' => $post
        ]);
    }


    public function update(Request $request, Post $post)
    {

        $title = 'required|max:55|unique:posts';
        if ($request->title === $post->title) {
            $title = 'required';
        }
        $validated = $request->validate([
            'title' => $title,
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        $validated['slug'] = Str::slug($request->title, '-');
        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->file('image')) {
            if($request -> oldImage){
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('images');
        }
     
        $post->update($validated);

        return redirect('dashboard/posts')->with('success', "Post successfully updated");
    }

  
    public function destroy(Post $post)
    {
       
       if($post->image){
           Storage::delete(($post->image));
       }
        Post::destroy($post->id);
        return redirect('dashboard/posts')->with('success', "Post successfully deleted");
    }
}
