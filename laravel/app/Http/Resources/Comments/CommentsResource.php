<?php

namespace App\Http\Resources\Comments;

use App\Http\Resources\Blog\ABlogResources;
use App\Http\Resources\Blog\BlogResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
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
            'is_active'=> $this->is_active,
            'created_at' => $this->created_at->format('d.m.Y H:i'),
            'updated_at' => $this->updated_at->format('d.m.Y H:i'),
            'user' => new UserResource($this->user),
            'blog' => new ABlogResources($this->blog),
        ];
    }
}
