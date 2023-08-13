<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppBlogController extends Controller
{
    //
    public function all_blogs() {
        return ["data" => Blogs::all()];

    }

    public function one_blog($id) {
        $blogs = Blogs::find($id);
        $comments = $blogs->comments;
        foreach ($comments as $comment) {
            $user = $comment->user; // Получаем объект пользователя, связанного с комментарием
            $userId = $user->id; // ID пользователя
            $userName = $user->name; // Имя пользователя
        }

        if ($blogs) {
            $data =  ['data' => $blogs,
                    ];
            return $data;
        } else {
            $data = [
                'status' => '404 Not found',
                'message' => 'Blog not found'
            ];
            return response()->json($data, 404);
        }
    }
    public function update_blog(Request $request, $id) {
        $blog = Blogs::find($id);

        if ($blog) {
        $blog->update($request->only(['title', 'text', "img", "preview"]));

        $data = [
            'status' => 'success',
            'message' => 'Запис успішно оновлено',
            'data' => Blogs::find($id),
        ];

        return response()->json($data, 200);}
        else {
            $data = [
                'status' => 'failed',
                'message' => 'Запису не знайдено',
                'data' => '',
            ];

            return response()->json($data, 200);}
        }

    public function delete_blog($id) {
        $blog = Blogs::find($id);

        if ($blog) {
            $blog->delete();

            $data = [
                'status' => 'success',
                'message' => 'Запис успішно видалено'
            ];
        } else {
            $data = [
                'status' => 'error',
                'message' => 'Запис не знайдено'
            ];
        }
        return $data;
    }
}
