<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $posts = Post::search($search)
            ->latest()
            ->paginate();

        return view('app.posts.index', compact('posts', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $blogs = Blog::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('app.posts.create', compact('blogs', 'users'));
    }

    /**
     * @param \App\Http\Requests\PostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create($validated);

        return redirect()->route('posts.edit', $post);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        return view('app.posts.show', compact('post'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post)
    {
        $blogs = Blog::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('app.posts.edit', compact('post', 'blogs', 'users'));
    }

    /**
     * @param \App\Http\Requests\PostUpdateRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update($validated);

        return redirect()->route('posts.edit', $post);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
