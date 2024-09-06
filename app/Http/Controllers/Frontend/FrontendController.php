<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\About;

class FrontendController extends Controller
{
    public function index()
    {
        $about = About::first();
        $blogs = Blog::where('status', 1)->latest()->get();

        return view('frontend.index', compact('blogs','about'));
    }
}
