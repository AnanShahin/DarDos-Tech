<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::all();

        return view('admin.blog.index')->with(compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[

            'title_en' =>'required',
            'title_ar' =>'nullable',
            'description_en'=>'nullable',
            'description_ar'=>'nullable',
            'image'=>'nullable',
            'slug' => 'string|unique:blog,slug',
            'status'=>'nullable',
        ]);

        $blog = New Blog;

        $blog->title_en =$request->title_en;
        $blog->title_ar =$request->title_ar;
        $blog->slug = str_replace(' ', '-', $request->title_en);
        $blog->description_en = $request->description_en;
        $blog->description_ar = $request->description_ar;
        $blog->status = $request->status == true ? '1':'0';

        if ($request->hasFile('image')) {

            $blogImageUploadPath = 'uploads/blog/image/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $blogImageFilename = time() .'.'. $ext;
            $file->move($blogImageUploadPath, $blogImageFilename);
            $blog->image = $blogImageUploadPath.$blogImageFilename;
        }


        if($blog->save()) {
            return redirect()->route('blogs.index')->with('status-success', 'blog Created Successfully');
        }
            return redirect()->route('blogs.index')->with('status-error', 'blog Create Failed');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit')->with(compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request,[

            'title_en' =>'required',
            'title_ar' =>'nullable',
            'description_en'=>'nullable',
            'description_ar'=>'nullable',
            'image'=>'nullable',
            'slug' => 'required',
            'status'=>'nullable',
        ]);

        $blog = Blog::findOrFail($id);

        $blog->title_en =$request->title_en;
        $blog->title_ar =$request->title_ar;
        $blog->slug = $request->slug;
        $blog->description_en = $request->description_en;
        $blog->description_ar = $request->description_ar;
        $blog->status = $request->status == true ? '1':'0';

        if ($request->hasFile('image')) {

            $blogImageUploadPath = 'uploads/blog/image/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $blogImageFilename = time() .'.'. $ext;
            $file->move($blogImageUploadPath, $blogImageFilename);
            $blog->image = $blogImageUploadPath.$blogImageFilename;
        }
        if ($request->has('remove_image')) {
            if (file_exists($blog->image)) {
                unlink($blog->image);
            }

            $blog->image = null;
        }

        if($blog->save()) {
            return redirect()->route('blogs.index')->with('status-success', 'blog Created Successfully');
        }
            return redirect()->route('blogs.index')->with('status-error', 'blog Create Failed');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blog = Blog::findOrFail($id);

        if ($blog->delete()) {
            return redirect()->back()->with('status-success', 'blog Deleted Successfully');
        }
        return redirect()->back()->with('status-error', 'blog Delete Failed');
    }
}
