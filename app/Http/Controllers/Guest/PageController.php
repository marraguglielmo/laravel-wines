<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wine;

class PageController extends Controller
{


    public function index(){

        $num_wines = Wine::count();
        return view('home', compact(('num_wines')));
    }

}
