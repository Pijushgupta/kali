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

    public function post_type(){
        $data = Post::where('post_type','post_type')->get();
        return Inertia::render('PostType',['post_types'=>$data]);
    }

    public function getMenu(){
        $menuItem = [   
                        [
                            'id' => 1,
                            'name' => 'Posts',
                            'type' => 'post',
                            'link' => '#',
                            'isChild' => false,
                            'icon'=>'IconBooks',
                            'child' => [
                                [
                                    'id' => 3,
                                    'name' => 'All Posts',
                                    'type' => 'post',
                                    'link' => '/dashboard/posts?type=post',
                                    'isChild' => true,
                                    'icon'=> 'IconBaselineDensityMedium',
                                    'child' => false
                                ],
                                [
                                    'id' => 4,
                                    'name' => 'Add New Post',
                                    'type' => 'post',
                                    'link' => '#',
                                    'isChild' => true,
                                    'icon'=>'IconTablePlus',
                                    'child' => false
                                ],
                                [
                                    'id' => 5,
                                    'name' => 'Categories',
                                    'type' => 'post',
                                    'link' => '#',
                                    'isChild' => true,
                                    'icon'=>false,
                                    'child' => false
                                ]
                            ]
                        ],
                        [
                            'id' => 2,
                            'name' => 'Pages',
                            'type' => 'page',
                            'link' => '#',
                            'isChild' => false,
                            'icon'=>'IconSquares',
                            'child' => [
                                [
                                    'id' => 6,
                                    'name' => 'All Pages',
                                    'type' => 'page',
                                    'link' => '#',
                                    'isChild' => true,
                                    'icon'=>false,
                                    'child' => [
                                        [
                                            'id' => 8,
                                            'name' => 'abc',
                                            'type' => 'abc',
                                            'link' => '#',
                                            'isChild' => true,
                                            'icon'=>false,
                                            'child' => false
                                        ],
                                        [
                                            'id' => 9,
                                            'name' => 'cde',
                                            'type' => 'cde',
                                            'link' => '#',
                                            'isChild' => true,
                                            'icon'=>false,
                                            'child' => false
                                        ]
                                    ]
                                ],
                                [
                                    'id' => 7,
                                    'name' => 'Add New Page',
                                    'type' => 'page',
                                    'link' => '#',
                                    'isChild' => true,
                                    'icon'=>false,
                                    'child' => false,
                                ]
                            ]
                        ],
                        [
                            'id' =>8,
                            'name' => 'Post Types',
                            'type' => 'postType',
                            'link' => '/dashboard/posttypes',
                            'isChild' => false,
                            'icon' => 'IconHierarchy3',
                            'child'=> false
                        ]
                    ];

        return  $menuItem;
    }

    public function getPostTypes(){
       

    }
}
