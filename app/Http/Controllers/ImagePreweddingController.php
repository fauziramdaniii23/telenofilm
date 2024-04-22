<?php

namespace App\Http\Controllers;

use App\Models\ImagePrewedding;
use App\Http\Requests\StoreImagePreweddingRequest;
use App\Http\Requests\UpdateImagePreweddingRequest;
use App\Models\Category;
use App\Models\User;

class ImagePreweddingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::where('name', 'prewedding')->first();
    
        $users = $category->users;
        return view('admin.categorie.prewedding.prewedding', [ 'users' => $users ,'title' => 'Prewedding']);
    }

    public function showUser($userId){
        // return $userId;
        $user = User::findOrFail($userId);

        $images = $user->imagePrewedding()->where('category_id', 1)->get();
        $video = $user->video()->where('category_id', 1)->get();

        return view('admin.categorie.prewedding.show', ['user' => $user, 'images' => $images, 'videos' => $video, 'title' => 'Show' ]);
    }
    
}
