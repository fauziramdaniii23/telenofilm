<?php

namespace App\Http\Controllers;

use App\Models\ImageWedding;
use App\Http\Requests\StoreImageWeddingRequest;
use App\Http\Requests\UpdateImageWeddingRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ImageWeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function wedding($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
    
        $users = $category->users;

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
    public function create()
    {
        return view('admin.categorie.wedding.create',[
            'users' => User::all(),
            'categories' => Category::all()
        ]);
    }
    public function autocomplete(Request $request)
    {
        $search = $request->get('term');
        $users = User::where('name', 'LIKE', '%'. $search .'%')->get()->pluck('name');
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageWeddingRequest $request)
    {

        if($request->hasFile('name')){
            $file=$request->file('name');
            foreach ($file as $image) {
                
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(\public_path('img/wedding/'),$imageName);
                
                ImageWedding::create([
                    'user_id' => $request->user_id,
                    'category_id' => 2,
                    'name' => $imageName,
                ]);
            }
        }

        return redirect('/dashboard/wedding')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function addPhotos($userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.categorie.wedding.sendPhoto', ['user' => $user]);
    }

    public function showPhotos($userId)
    {
        
        $user = User::findOrFail($userId);
        // $images = ImageWedding::where('user_id', $userId)->where('category_id', $category)->get();

        $images = $user->imageWedding()->where('category_id', 2)->get();

        return view('admin.categorie.wedding.show', ['user' => $user, 'images' => $images ]);
    }

    public function uploadImage(Request $request){
        
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048', // Sesuaikan dengan kebutuhan Anda
    ]);

    // Simpan gambar
    if ($request->hasFile('image')) {
        $file = $request->file('image');

        foreach($file as $image){
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img/wedding/'), $imageName);

        // Simpan data gambar ke dalam database
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


    public function deleteUserWedding($userId){
          // Temukan pengguna
    $user = User::findOrFail($userId);
    $categoryId = Category::findOrFail(2);

    $userWedding = User::whereHas('categories', function ($query) {
        $query->where('name', 'wedding');
    })->find($userId);

    if ($userWedding) {
    
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
        // Hapus semua gambar pengguna dari database
    } 

    return redirect()->back()->with('success', 'User berhasil dihapus dari kategory wedding');
    }

    public function show(ImageWedding $imageWedding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImageWedding $imageWedding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageWeddingRequest $request, ImageWedding $imageWedding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageWedding $imageWedding, $id)
    {
        //
    }
}
