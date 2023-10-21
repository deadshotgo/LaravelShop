<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Brands\BrandResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorCollection;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\Http\Resources\Tags\TagCollection;
use App\Http\Resources\Tags\TagResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description'=> $this->description,
            'information' => $this->information,
            'feature' => $this->feature,
            'qty' => $this->qty,
            'price' => $this->price,
            'article' => $this->article,
            'like' => $this->like,
            'is_active' => $this->is_active,
            'createdAt' => $this->created_at->format('d.m.Y H:i'),
            'updatedAt' => $this->updated_at->format('d.m.Y H:i'),
            'imageProducts'=>   $this->imageProducts,
            'colors'=>   new ColorCollection($this->whenLoaded('colors')),
            'tags'=>   new TagCollection($this->whenLoaded('tags')),
            'category'=>  new CategoryResource($this->whenLoaded('category')),
            'subCategory'=>  new SubCategoryResource($this->whenLoaded('subCategory')),
            'brand'=>  new BrandResource($this->whenLoaded('brand')),
        ];
    }
}
