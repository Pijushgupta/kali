<?php

namespace App\Http\Controllers\Dashboard;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostType as PT;

class PostType extends Controller
{

    /**
     * Returns all the post_types 
     * @return \Inertia\Response
     */
    public function getAll(){
        $data = PT::get();
        return Inertia::render('PostType',['post_types'=>$data]);
    }

    public function edit(Request $request){
        //this is for new post type 
        if(!$request->query('id')){
            return Inertia::render('PostTypeEdit');
        }
        //write the logic for getting the data for existing post type and return 
    }


    public function save(Request $request){
        $post_type = $request->validate([
            "label" => "required|string",
            "name"  => "required|string",
            "is_hidden" => "required|boolean",
            "taxonomy"  => "nullable|array",
            "taxonomy.*" => "string",
            "support"   => "nullable|array",
            "support.*" => "string",
            "hierarchical"  => "required|boolean",
            "menu_icon" => "nullable|string",
            "slug"  => "string|required"
        ]);
        
        PT::create($post_type);
        return Inertia::render('PostTypeEdit',$request);
    }
}
