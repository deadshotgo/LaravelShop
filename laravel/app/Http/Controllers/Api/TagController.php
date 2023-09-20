<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagRequest;
use App\Http\Resources\Tags\TagCollection;
use App\Http\Resources\Tags\TagResource;
use App\Models\Tag;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags =  QueryBuilder::for(Tag::class)
            ->defaultSort('-id')
            ->allowedSorts('name')
            ->allowedFilters([
                AllowedFilter::exact('is_active'),
                'name'])
            ->get();
        return new TagCollection($tags);
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
