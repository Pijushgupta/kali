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

    /**
     * Create or edit a post_type
     */
    public function edit(Request $request){
        //this is for new post type 
        if(!$request->route('id')){
            return Inertia::render('PostTypeEdit');
        }
        //write the logic for getting the data for existing post type and return 
        if($request->route('id') && is_numeric($request->route('id'))){
            $data = PT::where('id',$request->route('id'))->get();
            return Inertia::render('PostTypeEdit',['postType'=>$data[0]]);
        }
    }

    /**
     * Save or Update a post_type
     */
    public function save(Request $request){
        $isUpdate = false;
        if($request->filled('id')) $isUpdate = true;
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
            "slug"  => "required|string"
        ]);
        if($isUpdate == false){
            PT::create($post_type);
            $message = "Post type created successfully";
        } 
        if($isUpdate == true){
            $postType = PT::findOrFail($request->id); // Find the post type
            $postType->update($post_type);
            $message = "Post type updated successfully";
        } 
        
        return redirect()->back()->with('status',$message);
    }

    /**
     * delete a post type
     */
    public function delete(Request $request){
        if(!$request->route('id')) return;
        $postType = PT::find($request->route('id'));
        $postType->delete();
        return redirect()->route('getposttypes');  
    }
}
