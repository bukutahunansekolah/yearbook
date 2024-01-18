<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoverController extends Controller
{
    public function index()
    {
        return view('cover.index');
    }  
}
