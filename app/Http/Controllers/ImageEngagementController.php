<?php

namespace App\Http\Controllers;

use App\Models\ImageEngagement;
use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageEngagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::where('name', 'engagement')->first();
    
        $users = $category->users;
        return view('admin.categorie.engagement.engagement', [ 'users' => $users ,'title' => 'engagement']);
    }

    public function searchUserEngagement($categoryName, Request $request){
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
    
        return view('admin.categorie.engagement.engagement', ['users' => $users, 'title' => $categoryName]);
    
    }

    public function showUser($userId){
        // return $userId;
        $user = User::findOrFail($userId);

        $images = $user->imageEngagement()->where('category_id', 3)->get();
        $video = $user->video()->where('category_id', 3)->get();

        return view('admin.categorie.engagement.show', ['user' => $user, 'images' => $images, 'videos' => $video, 'title' => 'Show' ]);
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
            $image->move(public_path('img/engagement/'), $imageName);
    
            ImageEngagement::create([
                'user_id' => $request->user_id,
                'category_id' => 3,
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
                $file->move(public_path('video/engagement/'), $videoName);
        
                Video::create([
                    'user_id' => $request->user_id,
                    'category_id' => 3,
                    'name' => $videoName,
                ]);
            
        
                return redirect()->back()->with('success', 'video uploaded successfully.');
            }
        
            return redirect()->back()->with('error', 'Failed to upload video');
            }
        
            public function deleteUserEngagement($userId){
          
                $user = User::findOrFail($userId);
                $categoryId = Category::findOrFail(3);
            
                $userEngagement = User::whereHas('categories', function ($query) {
                    $query->where('name', 'engagement'); })->find($userId);  
            
                if ($userEngagement) {
            
                    if($userEngagement->video->isNotEmpty()){
                        foreach($userEngagement->video as $video)
                        $videoPath = public_path('video/engagement/'. $video->name);
                        
                        if(File::exists($videoPath)){
                            File::delete($videoPath);
                        }
                        $userEngagement->video()->delete();
                    }
                
                    if ($userEngagement->imageEngagement->isNotEmpty()) {
                        
                        foreach ($userEngagement->imageEngagement as $image) {
                           
                            $imagePath = public_path('img/engagement/' . $image->name);
            
            
                            if (File::exists($imagePath)) {
                                File::delete($imagePath);
                            }
                        }
            
                        $userEngagement->imageEngagement()->delete();
                    }
                    $user->categories()->detach($categoryId);
                } 
            
                return redirect()->back()->with('success', $user->name . ' berhasil dihapus dari kategory Engagement');
                }
            

}
