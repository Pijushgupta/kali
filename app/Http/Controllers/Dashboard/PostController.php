<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{
    //

    public function index(Request $request,int $numberOfPostsPerPage = 20){
        $param = $request->query('type');
        $param = is_string($param) ? $param : '';
        $data = Post::with(['author:id,name'])->where("post_type", $param)
        ->paginate($numberOfPostsPerPage)
        ->withQueryString();
            //dd($data);
        //return $data;
        return Inertia::render('Posts',['posts'=>$data]);
    }

    public function edit(Request $request){
        $type = $request->query('type');
        $type = is_string($type) ? $type : '';

        $id = $request->query('id');
        $id = is_string($id) ? $id : '';

        $data = Post::where('id',$id)->get();
        return Inertia::render('Edit',['post'=>$data]);

    }


    

    public function getPostTypes(){
       

    }
}
