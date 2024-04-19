<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        $pwPhoto = Paket::find(1);
        $pwVideo = Paket::find(2);
        $pwReguler = Paket::find(3);
        $pwMaksimal = Paket::find(4);
        $wdPhoto = Paket::find(5);
        $wdVideo = Paket::find(6);
        $wdReguler = Paket::find(7);
        $wdMaksimal = Paket::find(8);
        $enReguler = Paket::find(9);
        $enMaksimal = Paket::find(10);
        $groupGD = Paket::find(11);
        $groupGDmaksimal = Paket::find(12);
        $personalGD = Paket::find(13);
        $soulmateGD = Paket::find(14);
        
        return view('home', compact('pwPhoto', 'pwVideo', 'pwReguler', 'pwMaksimal',
                                     'wdPhoto', 'wdVideo', 'wdReguler', 'wdMaksimal',
                                    'enReguler', 'enMaksimal',
                                    'groupGD', 'groupGDmaksimal', 'personalGD', 'soulmateGD'));
    }
}
