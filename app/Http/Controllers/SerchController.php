<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SerchController extends Controller
{
    public function find(Request $requst){
        $search_name = $request->input('search_name');
        $query = User::query();
        
        if(!empty($keyword)){
            $query->where('name','like','%'.$search_name.'%');
        }
        return view('products.serch',compact('search_name'));
    }
    
}
