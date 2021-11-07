<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")
                           ->orWhere('description', 'like', "%$query%")
                           ->paginate(10);


        return view('search-results')->with('products', $products);
    }
}
