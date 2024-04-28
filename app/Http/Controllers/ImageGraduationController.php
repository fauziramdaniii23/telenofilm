<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageGraduation;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageGraduationController extends Controller
{
    
    public function index()
    {
        $category = Category::where('name', 'graduation')->first();
    
        $users = $category->users;
        return view('admin.categorie.graduation.graduation', [ 'users' => $users ,'title' => 'graduation']);
    }

    public function searchUserGraduation($categoryName, Request $request){
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
    
        return view('admin.categorie.graduation.graduation', ['users' => $users, 'title' => $categoryName]);
    
    }

    public function showUser($userId){
        // return $userId;
        $user = User::findOrFail($userId);

        $images = $user->imageGraduation()->where('category_id', 4)->get();
        $video = $user->video()->where('category_id', 4)->get();

        return view('admin.categorie.graduation.show', ['user' => $user, 'images' => $images, 'videos' => $video, 'title' => 'Show' ]);
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
            $image->move(public_path('img/graduation/'), $imageName);
    
            ImageGraduation::create([
                'user_id' => $request->user_id,
                'category_id' => 4,
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
                $file->move(public_path('video/graduation/'), $videoName);
        
                Video::create([
                    'user_id' => $request->user_id,
                    'category_id' => 4,
                    'name' => $videoName,
                ]);
            
        
                return redirect()->back()->with('success', 'video uploaded successfully.');
            }
        
            return redirect()->back()->with('error', 'Failed to upload video');
            }
        
            public function deleteUserGraduation($userId){
          
                $user = User::findOrFail($userId);
                $categoryId = Category::findOrFail(4);
            
                $userGraduation = User::whereHas('categories', function ($query) {
                    $query->where('name', 'graduation'); })->find($userId);  
            
                if ($userGraduation) {
            
                    if($userGraduation->video->isNotEmpty()){
                        foreach($userGraduation->video as $video)
                        $videoPath = public_path('video/graduation/'. $video->name);
                        
                        if(File::exists($videoPath)){
                            File::delete($videoPath);
                        }
                        $userGraduation->video()->delete();
                    }
                
                    if ($userGraduation->imageGraduation->isNotEmpty()) {
                        
                        foreach ($userGraduation->imageGraduation as $image) {
                           
                            $imagePath = public_path('img/graduation/' . $image->name);
            
            
                            if (File::exists($imagePath)) {
                                File::delete($imagePath);
                            }
                        }
            
                        $userGraduation->imageGraduation()->delete();
                    }
                    $user->categories()->detach($categoryId);
                } 
            
                return redirect()->back()->with('success', $user->name . ' berhasil dihapus dari kategory Graduation');
                }
}
