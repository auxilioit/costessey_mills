<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

class HomeController extends Controller
{
    public function index(){
        $locations = Location::all();

        return view('index',[
            'locations' => $locations
        ]);
    }
}
