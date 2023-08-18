<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\comment\CommentRequest;
use App\Http\Resources\Comments\CommentCollection;
use App\Http\Resources\Comments\CommentsResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CommentCollection(Comment::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $comment_store = Comment::create($request->validated());

        return new CommentsResource($comment_store);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new CommentsResource(Comment::with('blog')->findOrFail($id)->first());

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        return new CommentsResource($comment);
    }
}
