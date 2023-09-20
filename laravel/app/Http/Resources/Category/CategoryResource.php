<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\SubCategory\SubCategoryCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'isActive'=> $this->is_active,
            'createdAt' => $this->created_at->format('d.m.Y H:i'),
            'updatedAt' => $this->updated_at->format('d.m.Y H:i'),
            'subCategories'=> new SubCategoryCollection($this->subCategories),
            'products'=> new ProductCollection($this->products),
        ];
    }
}
