<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function teste(){
        
        $teste = 'elmoooooooow';
        $laravelVersion = '1.0';
        $phpVersion = phpversion();

        // dd(request()->route()->gatherMiddleware());

        return response()->jsonOrView('Welcome',compact(['teste', 'laravelVersion', 'phpVersion']), 200);
    }
}
