<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ImagePrewedding;

class WeddingController extends Controller
{
    function create(){
        return view('admin.categorie.prewedding.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    ImagePrewedding::create([
        'name' => $request->name,
    ]);


    return redirect('/dashboard/prewedding')->with('success', 'Data berhasil ditambahkan');
}

}
