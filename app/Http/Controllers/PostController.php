<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Assuming you have a 'data.json' file in your storage/app directory

        // $jsonData = json_decode(
        //     file_get_contents(storage_path("posts.json")),
        //     true
        // );

        // foreach ($jsonData as $item) {
        //     $model = new Post();
        //     $model->post_title = $item["post_title"];
        //     $model->post_name = $item["post_name"];
        //     $model->post_status = $item["post_status"];
        //     $model->updated_at = $item["post_modified"];
        //     $model->created_at = $item["post_date"];
        //     $model->post_parent = $item["post_parent"];
        //     $model->post_type = $item["post_type"];
        //     $model->post_author = $item["post_author"];
        //     $model->post_content = $item["post_content"];
        //     $model->lang = "bn";
        //     $model->save();
        // }
        $posts = Post::all()
            ->where("post_status", "publish")
            ->where("post_type", "post");
        $data["posts"] = $posts;

        return view("posts", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        $posts = Post::all()
            ->where("post_status", "publish")
            ->where("post_type", "post");
        $data["posts"] = $posts;
        $data["post"] = $post;
        return view("single", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    
}
