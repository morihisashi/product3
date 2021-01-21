<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class SearchController extends Controller
{
    public function find(Request $requst){
        
        return view('products.search',['search_name'=>$requst->search_name]);
    }
    
}
