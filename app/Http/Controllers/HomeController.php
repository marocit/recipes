<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Recipe;
use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::with('ingredients','tags', 'categories')->latest()->get();
        return view('home', compact('recipes'));
    }

    public function show($slug)
    {
        $recipe = Recipe::where('slug', '=', $slug)->first();
        // $recipe = Recipe::findOrFail($id)->with('ingredients', 'tags', 'categories')->get();
        return view('single', compact('recipe'));
    }

     public function tag($tag)
    {
        $tags = Tag::where('slug', '=', $tag)->first();
        $recipes = $tags->recipes;
        $tag = $tags->recipes->pluck('id');
        $test = $tags->id;
        $zutaten = Ingredient::whereIn('recipe_id', $tag)->get();
        $zutaten = $zutaten->unique('name')->count();

        /* $table = DB::table('ingredients')
                        ->select('name', 'einheit', DB::raw('SUM(ingredients.unit ) as unit'))
                        ->whereIn('recipe_id', $tag)
                        ->groupBy('name', 'einheit')
                        ->get(); */

        $table = DB::table('recipes')
                    ->leftJoin('ingredients', 'ingredients.recipe_id', '=', 'recipes.id' )
                    ->leftJoin('recipe_tag', 'recipe_tag.recipe_id', '=', 'recipes.id')
                    ->select('ingredients.name', 'ingredients.einheit', DB::raw('SUM(ingredients.unit * recipe_tag.amount) as unit'))
                    ->where('recipe_tag.tag_id', '=', $tags->id  )
                    ->groupBy('ingredients.name', 'ingredients.einheit')
                    ->get();


        //dd($zutaten);
        return view ('single_tag', compact('recipes', 'table', 'zutaten', 'tags'));
    }
}
