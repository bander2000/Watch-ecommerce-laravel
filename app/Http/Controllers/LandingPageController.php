<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $products=product::inRandomOrder()->take(7)->get();
        return view('index')->with('products',$products);
    }
}
