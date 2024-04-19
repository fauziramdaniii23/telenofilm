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

    function prewedding(){
        return view('admin.categorie.prewedding.test');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorie.prewedding.create',[
            'users' => User::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImagePreweddingRequest $request)
    {
        
            ImagePrewedding::create([
                'name' => $request->name
            ]);
        
        return redirect('/dashboard/prewedding')->with('success', 'data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(ImagePrewedding $imagePrewedding)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImagePrewedding $imagePrewedding)
    {
        return view('admin.category.prewedding.edit', [
            'prewedding' => $imagePrewedding
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImagePreweddingRequest $request, ImagePrewedding $imagePrewedding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImagePrewedding $imagePrewedding)
    {
        //
    }
}
