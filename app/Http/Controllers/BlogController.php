<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    public function store(CreateBlogRequest $request)
    {
       $payload = collect($request->validated());

       try {
          $blog = Blog::create($payload->toArray());
          return response()->json([
            "message" => "success",
            "data" => $blog
            ], 200);
       } catch (Exceptions $e) {
          return response()->json([
            "message" => "error"
            ], 500);
       }
    }

    public function index(Request $request)
    {
        try {
          $blogs = Blog::paginate($request->per_page);
          return response()->json([
            "message" => "success",
            "data" => $blogs
            ], 200);
       } catch (Exceptions $e) {
          return response()->json([
            "message" => "error"
            ], 500);
       }
    }

    public function show($id)
    {
        try {
           $blog = Blog::findOrFail($id);
           return response()->json([
            "message" => "success",
            "data" => $blog
            ], 200);
        } catch (Expections $e) {
            return response()->json([
            "message" => "error"
            ], 500);
        }
    }

    public function update(UpdateBlogRequest $request, $id)
    {   $payload = collect($request->validated());
        try {
            $blog = Blog::findOrFail($id);
            $blog->update($payload->toArray());
            return response()->json([
            "message" => "success",
            "data" => $blog
            ], 200);
        } catch (Expections $e) {
           return response()->json([
                "message" => "error"
            ], 500);
        }
    }

    public function destory($id)
    {
       try {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return response()->json([
            "message" => "success",
            "data" => $blog
            ], 200);
        } catch (Expections $e) {
           return response()->json([
                "message" => "error"
            ], 500);
        }
    }
}
