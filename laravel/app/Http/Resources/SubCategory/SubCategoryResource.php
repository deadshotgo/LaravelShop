<?php

namespace App\Http\Resources\SubCategory;

use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class   SubCategoryResource extends JsonResource
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
            'is_active'=> $this->is_active,
            'createdAt' => $this->created_at->format('d.m.Y H:i'),
            'updatedAt' => $this->updated_at->format('d.m.Y H:i'),
            'category'=>  new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
