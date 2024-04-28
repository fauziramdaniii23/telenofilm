<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        $category = Category::all();
        
        return view('admin.users.users', ['users' => $users , 'categories' => $category , 'title' => 'Users']);
    }

    public function search(Request $request)
    {
        
        $category = Category::all();

        if ($request->search) {
            $users = User::search($request->search)->paginate(10);
            if ($users->isEmpty()) {
                return back()->withErrors(['error' => 'Data tidak ditemukan!']);
            }
        } else {
            $users = User::paginate(10);
        }

        return view('admin.users.users', ['users' => $users, 'categories' => $category, 'title' => 'Users']);
    }

    public function makeAdmin($userId)
    {
        $user = User::findOrFail($userId);
        $user->role = 'admin';
        $user->save();

        return redirect()->back()->with('success', 'Role pengguna berhasil diubah menjadi admin.');
    }
    public function makeUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->role = 'user';
        $user->save();

        return redirect()->back()->with('success', 'Role pengguna berhasil diubah menjadi user.');
    }
        

    public function addCategory($userId, $categoryId)
    {

        $category = Category::find($categoryId);
        $user = User::find($userId);

        $user->categories()->attach($category);

        return redirect()->back()->with('success', $user->name . ' ditambahkan kategori '. $category->name);
    }

    public function removeCategory($userId, $categoryId)
    {

        $category = Category::find($categoryId);
        $user = User::find($userId);

        $user->categories()->detach($category);

        return redirect()->back()->with('success', $user->name . ' dihapus dari kategori '. $category->name);
    }
    
    public function delete($userId){
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect()->back()->with('success', 'User Berhasil Dihapus');
    }

    public function myGalerry($username){

        $category = Category::all();
        $user = User::where('name', $username)->first();

        return view('home.myGalerry.myGalerry', ['categories' => $category]);
    
    }
    public function galerry($username, $categoryName){
    $user = User::where('name', $username)->first();

    if (!$user) {
        return response()->view('errors.404', [], 404);
    }
    $images = $user->{"image" . ucfirst($categoryName)}()->get();

    return view('home.myGalerry.galerry', ['images' => $images, 'categoryName' => $categoryName]);
    }
}
