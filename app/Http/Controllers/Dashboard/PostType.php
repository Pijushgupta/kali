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
        
        if(!$request->query('id')){
            return Inertia::render('PostTypeEdit');
        }

    }
}
