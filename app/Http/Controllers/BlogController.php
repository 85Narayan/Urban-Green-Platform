<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Show all blogs
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    // Show form to create a blog
    public function create()
    {
        return view('blogs.create');
    }

    // Store new blog
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Blog::create($request->all());

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    // Show a single blog
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
{
    return view('blogs.edit', compact('blog'));
}

public function update(Request $request, Blog $blog)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $blog->update($request->only('title', 'content'));

    return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
}

public function destroy(Blog $blog)
{
    $blog->delete();
    return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
}

}
