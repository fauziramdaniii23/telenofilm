<?php

namespace App\Http\Controllers;

use App\Models\ImageWedding;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Support\Facades\File;

class ImageWeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function wedding($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
    
        $users = $category->users()->paginate(10);

        return view('admin.categorie.wedding.wedding', ['users' => $users, 'title' => $categoryName]);
    }

    public function searchUserWedding($categoryName, Request $request){
        // dd($request);
        // return $request;
        $category = Category::where('name', $categoryName)->first();
    
        $usersQuery = $category->users();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $usersQuery->where('name', 'like', '%' . $search . '%');
           
        }
    
        $users = $usersQuery->paginate(10);

        if($users->isEmpty()){
            return back()->withErrors(['error' => 'Data tidak ditemukan!']);
        }
    
        return view('admin.categorie.wedding.wedding', ['users' => $users, 'title' => $categoryName]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function autocomplete(Request $request)
    {
        $search = $request->get('term');
        $users = User::where('name', 'LIKE', '%'. $search .'%')->get()->pluck('name');
        return response()->json($users);
    }

    public function showPhotos($userId)
    {
        
        $user = User::findOrFail($userId);

        $images = $user->imageWedding()->where('category_id', 2)->get();
        $video = $user->video()->where('category_id', 2)->get();

        return view('admin.categorie.wedding.show', ['user' => $user, 'images' => $images, 'videos' => $video, 'title' => 'Show' ]);
    }

    public function uploadImage(Request $request){
        
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'image.*' => 'required|image'
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');

        foreach($file as $image){
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img/wedding/'), $imageName);

        ImageWedding::create([
            'user_id' => $request->user_id,
            'category_id' => 2,
            'name' => $imageName,
        ]);
    }

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    return redirect()->back()->with('error', 'Failed to upload image.');
    }

    public function uploadVideo(Request $request){
        
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'video' => 'mimes:mp4,mov,avi,wmv,mkv|max:50148',
    ]);

    if ($request->hasFile('video')) {
        $file = $request->file('video');

        $videoName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('video/wedding/'), $videoName);

        Video::create([
            'user_id' => $request->user_id,
            'category_id' => 2,
            'name' => $videoName,
        ]);
    

        return redirect()->back()->with('success', 'video uploaded successfully.');
    }

    return redirect()->back()->with('error', 'Failed to upload video');
    }


    public function deleteUserWedding($userId){
          // Temukan pengguna
    $user = User::findOrFail($userId);
    $categoryId = Category::findOrFail(2);

    $userWedding = User::whereHas('categories', function ($query) {
        $query->where('name', 'wedding'); })->find($userId);  

    if ($userWedding) {

        if($userWedding->video->isNotEmpty()){
            foreach($userWedding->video as $video)
            $videoPath = public_path('video/wedding/'. $video->name);
            
            if(File::exists($videoPath)){
                File::delete($videoPath);
            }
            $userWedding->video()->delete();
        }
    
        if ($userWedding->imageWedding->isNotEmpty()) {
            
            foreach ($userWedding->imageWedding as $image) {
               
                $imagePath = public_path('img/wedding/' . $image->name);


                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $userWedding->imageWedding()->delete();
        }
        $user->categories()->detach($categoryId);
    } 

    return redirect()->back()->with('success', $user->name . ' berhasil dihapus dari kategory wedding');
    }

}
