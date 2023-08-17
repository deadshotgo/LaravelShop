<?php

namespace App\Http\Controllers;

use App\Http\Resources\Blog\BlogResource;
use App\Http\Resources\Blog\BlogsResource;
use App\Models\Blogs;
use Illuminate\Http\Request;

class AppBlogController extends Controller
{
    public function all_blogs() {
        return BlogResource::collection(Blogs::all());

    }

    public function one_blog($id) {
        return new BlogResource(Blogs::with('comments')->findOrFail($id));
    }

    public function update_blog(Request $request, $id) {
        $blog = Blogs::find($id);
        $blog->update($request->only(['title', 'text', "img", "preview"]));
        return new BlogResource(Blogs::findOrFail($id));
    }

    public function delete_blog($id) {
        $blog = Blogs::find($id);
        $blog->update(['isActive' => false]);
        $blog->update();
        return new BlogResource(Blogs::findOrFail($id));
    }
    public function create_blog(Request $request) {
        $data = $request->only(['title', 'text', 'img', 'preview']);

        $blog = new Blogs();
        $blog->title = $data['title'];
        $blog->text = $data['text'];
        $blog->img = $data['img'];
        $blog->preview = $data['preview'];
        $blog->save();
        return $blog;
    }
}
