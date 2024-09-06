<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    //
    public function index()
    {
        $about = About::first();

        return view('frontend.about.index',compact('about'));
    }
}
