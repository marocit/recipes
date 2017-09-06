<?php

namespace App\Http\Controllers\Account;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('account.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('account.categories.create');
    }

    public function edit(Category $category)
    {
        //$category = Category::findOrFail($category);

        return view('account.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $this->handleRequest($request);
        $category->update($data);
        return redirect()->route('account.recipes.index')
            ->withSuccess('Kategorie wurde upgedatet');
    }

    public function store(StoreCategoryRequest $request)
    {

        $data = $this->handleRequest($request);
        Category::create($data);

        return redirect()->route('account.recipes.index')
            ->withSuccess('Neue Kategorie wurde angelegt');
    }

    private function handleRequest($request)
    {
        $data = $request->all();
        $data['slug'] = strtolower(str_slug($request->slug, ('-')));

        return $data;
    }
}
