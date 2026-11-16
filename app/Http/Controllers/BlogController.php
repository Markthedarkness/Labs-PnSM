<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Filter;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'filter' => ['nullable', 'integer', 'exists:filter,filter_id'],
        ]);

        $filterId = $request->query('filter');

        $blogs = Blog::query()
            ->with(['category', 'author', 'filters'])
            ->when(
                $filterId,
                fn ($query) => $query->whereHas(
                    'filters',
                    fn ($q) => $q->whereKey($filterId)
                )
            )
            ->orderByDesc('dt_created')
            ->paginate(6)
            ->withQueryString();

        $filters = Filter::orderBy('filter_name')->pluck('filter_name', 'filter_id');

        return view('blog.index', compact('blogs', 'filters', 'filterId'));
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
            'filters' => Filter::orderBy('filter_name')
                ->pluck('filter_name', 'filter_id'),
            'selected' => [],
        ]);
    }
    public function store(BlogRequest $request)
    {
        $data = $request->validated();

        $blog = Blog::create([
            ...\Illuminate\Support\Arr::except($data, ['filters']),
            'user_id' => auth()->id(),
        ]);

        $blog->filters()->sync($data['filters'] ?? []);

        return redirect()->route('blog.show', $blog);
    }

    public function show(Blog $blog)
    {
        $blog->load(['category', 'author']);

        return view('blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $blog->load('filters');

        return view('blog.edit', [
            'blog' => $blog,
            'categories' => Category::orderBy('category_name')
                ->pluck('category_name', 'category_id'),
            'filters' => Filter::orderBy('filter_name')
                ->pluck('filter_name', 'filter_id'),
            'selected' => $blog->filters->pluck('filter_id')->all(),
        ]);
    }
    public function tags(Blog $blog)
    {
        $blog->load('filters');

        return view('blog.tags', [
            'blog' => $blog,
            'filters' => Filter::orderBy('filter_name')
                ->pluck('filter_name', 'filter_id'),
            'selected' => $blog->filters->pluck('filter_id')->all(),
        ]);
    }

    public function tagsStore(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'filters' => ['sometimes', 'array'],
            'filters.*' => ['integer', 'distinct', 'exists:filter,filter_id'],
        ]);

        $blog->filters()->sync($data['filters'] ?? []);

        return redirect()->route('blog.show', $blog);
    }
    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->validated();

        $blog->update(\Illuminate\Support\Arr::except($data, ['filters']));
        $blog->filters()->sync($data['filters'] ?? []);

        return redirect()->route('blog.show', $blog);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.admin');
    }
}
