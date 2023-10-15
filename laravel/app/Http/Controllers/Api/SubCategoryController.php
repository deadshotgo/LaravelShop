<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryRequest;
use App\Http\Resources\SubCategory\SubCategoryCollection;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_categories =  QueryBuilder::for(SubCategory::class)
            ->defaultSort('-id')
            ->allowedSorts('name')
            ->allowedFilters([
                AllowedFilter::exact('is_active'),
                AllowedFilter::exact('id'),
                'name'])
            ->with('category')->limit($req->limit ?? '')->get();
        return new SubCategoryCollection($sub_categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request)
    {
        $sub_category_store = SubCategory::create($request->validated());
        return new $sub_category_store;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new SubCategoryResource(SubCategory::with('category')->findOrFail($id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->validated());
        return new SubCategoryResource($subCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
