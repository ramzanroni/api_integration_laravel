<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    function getData()
    {
       return ["name"=>"Ramzan",
            "address"=>"Dhaka"    
    ];
    }
}
