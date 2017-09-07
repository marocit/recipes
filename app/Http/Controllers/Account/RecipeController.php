<?php

namespace App\Http\Controllers\Account;

use App\Tag;
use App\User;
use App\Recipe;
use App\Category;
use App\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Recipe\StoreRecipeRequest;
use App\Http\Requests\Recipe\UpdateRecipeRequest;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::latest()->get();
        return view('account.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request)
    {
        $data = $this->handleRequest($request);
        auth()->user()->recipes()->create($data);

        return redirect()->route('account.recipes.index')
            ->withSuccess('Neues Rezept wurde angelegt');
    }

    private function handleRequest($request)
    {
        $data = $request->all();
        $data['slug'] = strtolower(str_slug($request->name, ('-')));

        return $data;
    }

    public function addIngredient(Request $request)
    {
        Ingredient::forceCreate([
            'name' => request('name'),
            'unit' => request('unit'),
            'einheit' => request('einheit'),
            'recipe_id' => request('recipe_id')
        ]);

        return ['message' => 'Ingredient created'];
    }

     public function fetchIngredients($id)
    {
        $recipe = Recipe::findOrFail($id);

        $fetch = $recipe->ingredients;

        return response()->json($fetch, 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $categories = Category::all()->pluck('name', 'id')->all();
        $tags = Tag::all()->pluck('name', 'id')->all();
        return view('account.recipes.edit', compact('recipe', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $data = $this->handleRequest($request);
        $recipe->update($data);

        return redirect()->route('account.recipes.index')
            ->withSuccess('Rezept wurde geändert!');
    }

    public function CategoryUpdate(Request $request, $id )
    {
        $recipe = Recipe::findOrFail($id);
        $categories = $request->input('categories');
        $data = $recipe->categories()->sync($categories);


        return redirect()->back()
            ->withSuccess('Kategorie wurde geändert!');
    }

    public function TagUpdate(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $tags = $request->input('tags');
        $data = $recipe->tags()->sync($tags);


        return redirect()->back()
            ->withSuccess('Anlass wurde geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $recipe)
    {
        //
    }

    public function fetchCategories()
    {
        $categories = Category::pluck('name','id')->all();
        return response()->json($categories, 200);
    }

    public function fetchTags()
    {
        $tags = Tag::pluck('name','id')->all();
        return response()->json($tags, 200);
    }
}
