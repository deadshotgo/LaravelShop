<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tags\TagsResource;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function all_tags() {
        return TagsResource::collection(Tags::all());
    }
}
