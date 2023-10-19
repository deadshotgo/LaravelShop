<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\ColorRequest;
use App\Http\Resources\Color\ColorCollection;
use App\Http\Resources\Color\ColorResource;
use App\Models\Color;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors =  QueryBuilder::for(Color::class)
            ->allowedFilters([
                AllowedFilter::exact('is_active'),
            ])
            ->paginate($req->limit ?? 15)
            ->appends(request()->query());
       return new ColorCollection($colors);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorRequest $request)
    {
        $color_store = Color::create($request->validated());

        return new ColorResource($color_store);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ColorResource(Color::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorRequest $request, Color $color)
    {
        $color->update($request->validated());
        return new ColorResource($color);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
