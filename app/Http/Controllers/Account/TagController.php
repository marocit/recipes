<?php

namespace App\Http\Controllers\Account;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('account.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('account.tags.create');
    }

    public function edit(Tag $tag)
    {
        //$category = Category::findOrFail($category);

        return view('account.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $data = $this->handleRequest($request);
        $tag->update($data);
        return redirect()->route('account.recipes.index')
            ->withSuccess('Anlass wurde upgedatet');
    }

    public function store(StoreTagRequest $request)
    {

        $data = $this->handleRequest($request);
        Tag::create($data);

        return redirect()->route('account.recipes.index')
            ->withSuccess('Neuer Anlass wurde angelegt');
    }

    private function handleRequest($request)
    {
        $data = $request->all();
        $data['slug'] = strtolower(str_slug($request->slug, ('-')));

        return $data;
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->recipes()->detach();
        $tag->delete();
        return response()->json($tag, 200);
    }
}
