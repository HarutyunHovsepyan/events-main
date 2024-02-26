<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('end_date', '>=', Carbon::now())->get();
        return view('post.index', compact('posts'));
    }


    public function create()
    {
        return view('post.add-post');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        $validatedData['user_id'] = Auth::id();

        Post::create($validatedData);

        return redirect()->route('users')->with('success', 'Post created successfully!');
    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
        return redirect()->route('my-post.index')->with('success', 'Post deleted successfully!');
    }

    public function expired()
    {
        $expiredPosts = Post::where('end_date', '<', Carbon::now())->get();

        foreach ($expiredPosts as $post) {
            $post->is_archive = true;
            $post->save();
        }

        return view('post.expired', compact('expiredPosts'));
    }


    public function toggleInvite(Request $request, Post $post)
    {
        if ($post->isInvited()) {
            $post->cancelInvite();
            $action = 'cancel';
        } else {
            $post->invite();
            $action = 'invite';
        }

        session()->flash('invited_post', $post->id);

        return back()->with('action', $action);
    }
}
