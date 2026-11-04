<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['category', 'author'])
            ->orderByDesc('dt_created')
            ->paginate(6);

        return view('blog.index', compact('blogs'));
    }

    public function admin(Request $request)
    {
        $query = Blog::with('category');

        // Пошук за заголовком
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        // Фільтр за категорією
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $blogs = $query
            ->orderByDesc('dt_created')
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('category_name')
            ->pluck('category_name', 'category_id');

        return view('blog.admin', compact('blogs', 'categories'));
    }

    public function create()
    {
        return view('blog.create', [
            'categories' => Category::orderBy('category_name')
                ->pluck('category_name', 'category_id'),
        ]);
    }

    public function store(BlogRequest $request)
    {
        $blog = Blog::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('blog.show', $blog);
    }

    public function show(Blog $blog)
    {
        $blog->load(['category', 'author']);

        return view('blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', [
            'blog' => $blog,
            'categories' => Category::orderBy('category_name')
                ->pluck('category_name', 'category_id'),
        ]);
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());

        return redirect()->route('blog.show', $blog);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.admin');
    }
}
