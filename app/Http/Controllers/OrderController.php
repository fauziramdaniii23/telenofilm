<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    function addOrder(Request $request, $paketId)
    {
        // return $request;
        $request->validate([
            'user_id' => 'required',
            'booking' => 'required | date',
        ]);

        $order = new Order([
            'user_id' => $request->user_id,
            'paket_id' => $paketId,
            'booking' => $request->booking,
        ]);

        $paket = Paket::find($paketId);

        $category = $paket->category;
        $user = User::find($request->user_id);

        $user->categories()->syncWithoutDetaching($category);
        
    $order->save();

    Alert::success('Success', 'Pesanan Berhasil');
    
    return back()->with('success', 'Pasanan berhasil');
    }

    function editOrder(Request $request, $id){
        

        $request->validate([
            'booking' => 'required | date',
        ]);

        $order = Order::findOrFail($id);

        $order -> update([
            'paket_id' => $request->paket_id,
            'booking' => $request->booking,
        ]);

        
        Alert::success('Success', 'Order Berhasil Disimpan');
        return back()->with('success', 'Order berhasil disimpan');
    }

    function dataOrder($username){
          
    $user = User::where('name', $username)->first();

    
    $title = 'Delete Pesanan!';
    $text = 'Are you sure you want to delete?';
    confirmDelete($title, $text);
    
    if ($user) {
        $orders = $user->orders;
        return view('home.order.dataOrder', ['orders' => $orders]);
        
    } else {
        return response()->view('errors.404', [], 404);
    }
    }

    public function historyOrder($username) {
        $user = User::where('name', $username)->first();

        $orders = $user->orders()->where('status', 'completed')->get();

        return view('home.order.historyOrder', ['orders' => $orders]);
    }


    public function deleteUserOrder($orderId) {
        $order = Order::find($orderId);
        
        if (!$order) {
            return response()->view('errors.404', [], 404);
        }

        $order->delete();
        
        Alert::success('Success', 'Pesanan Dibatalkan');
        return redirect()->route('dataOrder', ['username' => $order->user->name])
                         ->with('success', 'Order successfully deleted!');
    }
}
