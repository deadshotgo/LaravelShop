<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\BrandRequest;
use App\Http\Requests\Brands\UpdateBrandRequest;
use App\Http\Resources\Brands\BrandCollection;
use App\Http\Resources\Brands\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_categories =  QueryBuilder::for(Brand::class)
            ->defaultSort('-id')
            ->allowedSorts('name')
            ->allowedFilters([
                AllowedFilter::exact('is_active'),
                AllowedFilter::exact('id'),
                'name'])->limit($req->limit ?? '')->get();
        return new BrandCollection($sub_categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $validatedData = $request->validated();
        $image = $request->file('image');
        $qwe = Storage::disk('s3')->put('image', $image);
        $fullUrl = Storage::disk('s3')->url($qwe);
        $validatedData['image'] = $fullUrl;
        $validatedData['is_active'] =  boolval($validatedData['is_active']);
        $brand_store = Brand::create($validatedData);
        return new BrandResource($brand_store);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validateArr = $request->validated();
        $validateArr['is_active'] === 'true' ? $validateArr['is_active'] = true : $validateArr['is_active'] = false;
        if(!$validateArr['image'] || $validateArr['image'] === 'null') {
            $validateArr['image'] = $brand['image'];
        } else {
            $image = $request->file('image');
            $qwe = Storage::disk('s3')->put('image', $image);
            $fullUrl = Storage::disk('s3')->url($qwe);
            $validateArr['image'] = $fullUrl;
        }
        $brand->update($validateArr);
        return new BrandResource($brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
