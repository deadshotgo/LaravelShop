<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagRequest;
use App\Http\Resources\Tags\TagCollection;
use App\Http\Resources\Tags\TagResource;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TagCollection(Tag::where('is_active', "!=", false)->paginate(15));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $tag_store = Tag::create($request->validated());

        return new TagResource($tag_store);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new TagResource(Tag::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return new TagResource($tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
