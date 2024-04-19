<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\Order;
use App\Models\Paket;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function index(){
        $paket = Paket::all();
        $category = Category::all();
        $order = Order::all();
        
        $title = 'Hapus Pesanan!';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);

        return view('admin.main', [
        'title' => 'Admin',
        'pakets' => $paket,
        'categories' => $category,
        'orders' => $order,
    ]);
    }

//     public function searchOrder(Request $request)
// {
//     $category = Category::all();
//     $paket = Paket::all();

//     $search = $request->input('search');

//     if ($search) {
//         $orders = Order::search($search)->paginate(10);

//         if ($orders->isEmpty()) {
//             return back()->withErrors(['error' => 'Data tidak ditemukan!']);
//         }
//     } else {
//         $orders = Order::paginate(10);
//     }
//     $title = 'Hapus Pesanan!';
//     $text = 'Are you sure you want to delete?';
//     confirmDelete($title, $text);

//     return view('admin.main', [
//         'title' => 'Admin',
//         'pakets' => $paket,
//         'categories' => $category,
//         'orders' => $orders,
//     ]);
// }



public function searchOrder(Request $request)
{
    $category = Category::all();
    $paket = Paket::all();

    $search = $request->input('search');

    if ($search) {
        $orders = Order::whereHas('user', function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        })->paginate(10);

        if ($orders->isEmpty()) {
            return back()->withErrors(['error' => 'Data tidak ditemukan!']);
        }
    } else {
        $orders = Order::paginate(10);
    }
    $title = 'Hapus Pesanan!';
    $text = 'Are you sure you want to delete?';
    confirmDelete($title, $text);

    return view('admin.main', [
        'title' => 'Admin',
        'pakets' => $paket,
        'categories' => $category,
        'orders' => $orders,
    ]);
}


    function addpaket(Request $request){
    
    $request->validate([
        'name' => 'required|string',
        'category' => 'required',
        'description' => 'required|string',
        'price' => 'required',
    ]);

    $paket = new Paket([
        'name' => $request->name,
        'category_id' => $request->category,
        'description' => $request->description,
        'price' => $request->price
    ]);

    // Simpan paket ke dalam database
    $paket->save();
    Alert::success('Success', 'Paket Berhasil Ditambahkan');
    return back()->with('success', 'Paket berhasil ditambahkan');

    }

    
    public function updateStatus(Request $request, $orderId) {
        
        $request->validate([
            'status' => 'required|in:pending,processing,completed',
        ]);
        
        $order = Order::find($orderId);

        $order->status = $request->input('status');
        $order->save();

        // Redirect kembali ke halaman data order atau halaman lain sesuai kebutuhan
        return redirect('/dashboard')->with('success', 'Order status successfully updated!');
        
    }

    function deletepaket($id){
        $data = Paket::findOrFail($id);

        $data->delete();
        alert()->success('Deleted','Paket Deleted Successfully');

        return redirect()->back()->with('success', 'Data has been deleted successfully!');
    }

    function deleteOrder($id){
        $data = Order::findOrFail($id);
    
        $data->delete();
        alert()->success('Deleted','Pesanan Deleted Successfully');
    
        return redirect()->back()->with('success', 'Data has been deleted successfully!');
    }
}


