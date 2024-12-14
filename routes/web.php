<?php

use App\Http\Controllers\Dashboard\PostController as DashboardPostController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;



Route::get("/", function () {
    return view("welcome");
});

Route::get("/গল্প", [PostController::class, "index"]);

Route::get("/গল্প/{post}", [PostController::class, "show"])->name("post.show");

//login form
Route::get("/login", [AuthController::class, "showLogin"])->name("login");
Route::post("/login", [AuthController::class, "submitLogin"]);
Route::get("/logout", [AuthController::class, "logout"]);

//Route::get("/temp", [AuthController::class, "createTempUser"]);

//inertia js routes - Protected 
Route::middleware(['auth', 'verified'])->group(function () {
    /**
     * sidebar Menu
     */
    $sidebarMenuItemsObj = new DashboardPostController;
    $sidebarMenuItems = $sidebarMenuItemsObj->getMenu();
    Inertia::share([
        'sidebarMenuItems' => $sidebarMenuItems
        
    ]);
    /**
     * sidebar menu ends 
     */

     
    Route::get('/dashboard',function(){
        return Inertia::render('Dashboard');
    })->name('dashboard.default');

    Route::get('/dashboard/posts',[DashboardPostController::class,'index']);

    Route::get('/dashboard/edit',[DashboardPostController::class,'edit']);

    Route::get('/dashboard/posttypes',[DashboardPostController::class,'post_type']);

});


