<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
    {
        $filters = Filter::orderBy('filter_name')->paginate(15);

        return view('filters.index', compact('filters'));
    }

    public function create()
    {
        return view('filters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'filter_name' => ['required', 'string', 'max:100'],
            'filter_description' => ['nullable', 'string'],
        ]);

        Filter::create($validated);

        return redirect()->route('filters.index')
            ->with('success', 'Мітку додано.');
    }

    public function edit(Filter $filter)
    {
        return view('filters.edit', compact('filter'));
    }

    public function update(Request $request, Filter $filter)
    {
        $validated = $request->validate([
            'filter_name' => ['required', 'string', 'max:100'],
            'filter_description' => ['nullable', 'string'],
        ]);

        $filter->update($validated);

        return redirect()->route('filters.index')
            ->with('success', 'Мітку оновлено.');
    }

    public function destroy(Filter $filter)
    {
        $filter->delete();

        return redirect()->route('filters.index')
            ->with('success', 'Мітку видалено.');
    }
}
