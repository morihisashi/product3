<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Search;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function find(Request $request){
        $name = $request->search_name;
        $products = Product::where('name', 'like', '%'.$name.'%')->get();
        
        return view('products.search', compact('products'));
    }
    
}
