<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('home');
    }

    public function newsletter(Request $request){
        //
        return back()->with('success','true');
    }
}
