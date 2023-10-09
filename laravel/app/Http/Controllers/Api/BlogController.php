<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\blog\BlogRequest;
use App\Http\Resources\Blog\BlogCollection;
use App\Http\Resources\Blog\BlogResource;
use App\Models\Blog;
use Spatie\QueryBuilder\AllowedFilter;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $blogs =  QueryBuilder::for(Blog::class)
            ->defaultSort('-id')
            ->allowedSorts('like', 'created_at')
            ->allowedIncludes(['tags'])
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('is_active'),
                AllowedFilter::exact('tagsId','tags.id'),
                ])
            ->with('tags')
            ->with('comments')
            ->paginate($req->limit ?? 15)
            ->appends(request()->query());
        return new BlogCollection($blogs);    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $blog_store = Blog::create($request->validated());

        return new BlogResource($blog_store);
    }

    /**
     * Display the specified resourcea.
     */
    public function show(string $id)
    {
        $blog = Blog::with('comments')->findOrFail($id);
        return new BlogResource($blog);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());
        return new BlogResource($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
