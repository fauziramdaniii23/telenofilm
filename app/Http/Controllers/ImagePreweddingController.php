<?php

namespace App\Http\Controllers;

use App\Models\ImagePrewedding;
use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function searchUserPrewedding($categoryName, Request $request){
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
    
        return view('admin.categorie.prewedding.prewedding', ['users' => $users, 'title' => $categoryName]);
    
    }

    public function showUser($userId){
        // return $userId;
        $user = User::findOrFail($userId);

        $images = $user->imagePrewedding()->where('category_id', 1)->get();
        $video = $user->video()->where('category_id', 1)->get();

        return view('admin.categorie.prewedding.show', ['user' => $user, 'images' => $images, 'videos' => $video, 'title' => 'Show' ]);
    }

    public function uploadImage(Request $request){
        // return $request;
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'image.*' => 'required|image'
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
    
            foreach($file as $image){
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/prewedding/'), $imageName);
    
            ImagePrewedding::create([
                'user_id' => $request->user_id,
                'category_id' => 1,
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
                $file->move(public_path('video/prewedding/'), $videoName);
        
                Video::create([
                    'user_id' => $request->user_id,
                    'category_id' => 1,
                    'name' => $videoName,
                ]);
            
        
                return redirect()->back()->with('success', 'video uploaded successfully.');
            }
        
            return redirect()->back()->with('error', 'Failed to upload video');
            }
        
            public function deleteUserPrewedding($userId){
          
                $user = User::findOrFail($userId);
                $categoryId = Category::findOrFail(1);
            
                $userPrewedding = User::whereHas('categories', function ($query) {
                    $query->where('name', 'prewedding'); })->find($userId);  
            
                if ($userPrewedding) {
            
                    if($userPrewedding->video->isNotEmpty()){
                        foreach($userPrewedding->video as $video)
                        $videoPath = public_path('video/prewedding/'. $video->name);
                        
                        if(File::exists($videoPath)){
                            File::delete($videoPath);
                        }
                        $userPrewedding->video()->delete();
                    }
                
                    if ($userPrewedding->imagePrewedding->isNotEmpty()) {
                        
                        foreach ($userPrewedding->imagePrewedding as $image) {
                           
                            $imagePath = public_path('img/prewedding/' . $image->name);
            
            
                            if (File::exists($imagePath)) {
                                File::delete($imagePath);
                            }
                        }
            
                        $userPrewedding->imagePrewedding()->delete();
                    }
                    $user->categories()->detach($categoryId);
                } 
            
                return redirect()->back()->with('success', $user->name . ' berhasil dihapus dari kategory Prewedding');
                }
            
    
}
