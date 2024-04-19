<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Paket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaketController extends Controller
{
    function index(){
        $paket = Paket::all();
        $category = Category::all();
        $order = Order::all();
        
        $title = 'Delete Paket!';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);

        return view('admin.paket.paket', [
        'title' => 'Admin',
        'pakets' => $paket,
        'categories' => $category,
        'orders' => $order,
    ]);
    }
    function editpaket(Request $request, $id){
        
        $request->validate([
            'name' => 'required|string',
            'category' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        
        $paket = Paket::findOrFail($id);

        $paket -> update([
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price
        ]);
    
        Alert::success('Success', 'Paket Berhasil Disimpan');
        return back()->with('success', 'Paket berhasil disimpan');
    
    }
}
