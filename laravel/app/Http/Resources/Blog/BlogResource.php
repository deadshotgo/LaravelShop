<?php

namespace App\Http\Resources\Blog;

use App\Http\Resources\Comments\CommentResource;
use App\Http\Resources\Tags\TagResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'text' => $this->text,
            'previewText' => $this->preview_text,
            'preview' => $this->preview,
            'img' => $this->img,
            'like' => $this->like,
            'isActive' => $this->is_active,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'tags' =>  TagResource::collection($this->tags),

        ];
    }
}
