<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class GoalController extends Controller
{
    public function index()
    {
        $query = Item::orderBy('id','DESC')->with('author'); 
        
        return view('goal.index');
    }
    
    public function index(Request $request) 
    { 
     $query = Item::orderBy('id','DESC')->with('author'); 
     if(!Auth::user()->hasRole('admin')){ 
       $query=$query->where('author_id', Auth::user()->id); 
      } 
     $items = $query->paginate(5); 
     return view('items.index',compact('items')) 
      ->with('i', ($request->input('page', 1) - 1) * 5); 
    } 
}
