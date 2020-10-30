<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;

class BlogController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $blogs = Blog::search($search)
            ->latest()
            ->paginate();

        return view('app.blogs.index', compact('blogs', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::pluck('name', 'id');

        return view('app.blogs.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\BlogStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        $validated = $request->validated();

        $blog = Blog::create($validated);

        return redirect()->route('blogs.edit', $blog);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Blog $blog)
    {
        return view('app.blogs.show', compact('blog'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blog $blog)
    {
        $users = User::pluck('name', 'id');

        return view('app.blogs.edit', compact('blog', 'users'));
    }

    /**
     * @param \App\Http\Requests\BlogUpdateRequest $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $validated = $request->validated();

        $blog->update($validated);

        return redirect()->route('blogs.edit', $blog);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index');
    }
}
