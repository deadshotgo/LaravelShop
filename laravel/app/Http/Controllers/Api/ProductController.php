<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {

        $products =  QueryBuilder::for(Product::class)
            ->defaultSort('-id')
            ->allowedSorts('title','like','price', 'created_at')
            ->allowedIncludes(['brand','category','subCategory','colors','tags'])
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('feature'),
                AllowedFilter::exact('is_active'),
                AllowedFilter::exact('sub_category_id'),
                AllowedFilter::scope('price_between'),
                AllowedFilter::exact('tagsId','tags.id'),
                'title'])
            ->with('imageProducts')
            ->paginate($req->limit ?? 15)
            ->appends(request()->query());
       return new ProductCollection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category',  'subCategory', 'brand', 'imageProducts', 'colors', 'tags')->findOrFail($id);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
