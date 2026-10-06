<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

        if ($q = $request->query('q')) {
            $query->where('title', 'like', "%{$q}%");
        }

        $items = $query->latest()->paginate(10)->withQueryString();

        return view('posts.index', compact('items'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        Post::create($this->validated($request));

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['item' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['item' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($this->validated($request, $post));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    private function validated(Request $request, ?Post $post = null): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'body' => 'required|string|min:10',
        ]);

        return $data;
    }
}
