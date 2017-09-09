<?php

namespace App\Http\Controllers\Api;

use App\Tag;
use App\Recipe;
use App\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CauseApiController extends Controller
{
    public function apiCauseStore()
    {
        //
    }

    public function apiCauseFetch($id)
    {
        $recipe = Recipe::findOrFail($id);

        $fetch = $recipe->ingredients;

        return response()->json($fetch, 200);
    }

    public function FetchAllTags()
    {
        $tags = Tag::all()->pluck('name');
        return response()->json($tags, 200);
    }


    public function fetchTags($id)
    {
        $tags = Recipe::findOrFail($id)->tags;

        return response()->json($tags, 200);
    }

     public function apiAmountStore(Request $request)
    {
        $data = $request->all();

        $id = $data['recipe_id'];
        $tag = $data['tag'];
        $amount = $data['amount'];
        //return dd($tag);
        $recipe = Recipe::findOrFail($id);

        $recipe->tags()->updateExistingPivot($tag, ['amount' => $amount]);
        return response()->json($recipe, 200);

    }

    public function apiDeleteIngredient($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return response()->json($ingredient, 200);
    }
}
