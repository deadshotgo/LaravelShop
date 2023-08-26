<?php

namespace App\Http\Resources\Comments;

use App\Http\Resources\Blog\ABlogResources;
use App\Http\Resources\Blog\BlogResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'text' => $this->text,
            'isActive'=> $this->is_active,
            'createdAt' => $this->created_at->format('d.m.Y H:i'),
            'updatedAt' => $this->updated_at->format('d.m.Y H:i'),
            'user' => new UserResource($this->user),
            'blog' => new BlogResource($this->whenLoaded('blog')),
        ];
    }
}
