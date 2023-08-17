<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comments\CommentsResource;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function create_comment(Request $request) {
        $data = $request->only(['text', 'blog_id', 'user_id']);

        $comment = new Comments();
        $comment->text = $data['text'];
        $comment->blog_id = $data['blog_id'];
        $comment->user_id = $data['user_id'];
        $comment->save();
        return $comment;
    }
    public function all_comments() {
        return CommentsResource::collection(Comments::with('user')->get());
    }

    public function one_comment($id) {
        return new CommentsResource(Comments::with('user')->findOrFail($id));
    }

    public function update_comment(Request $request, $id) {
        $comment = Comments::find($id);
        $comment->update($request->only(['text']));
        return new CommentsResource(Comments::findOrFail($id));
    }
    public function delete_comment($id) {
        $comment = Comments::find($id);
        $comment->update(['isActive' => false]);
        $comment->update();
        return new CommentsResource(Comments::findOrFail($id));
    }
}
