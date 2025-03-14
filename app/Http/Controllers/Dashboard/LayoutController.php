<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\PostType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    //
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
                            'link' => '/dashboard/posttype',
                            'isChild' => false,
                            'icon' => 'IconHierarchy3',
                            'child'=> false
                        ]
                    ];
        return  $menuItem;
    }

    public function getPostType(){
        $postType = PostType::where('is_hidden',false)->get();
    }

    
    public function getSharedData(){
        if(!Auth::check()) return [];
        return [
            'sidebarMenuItems' => $this->getMenu()
        ];
    }

}
