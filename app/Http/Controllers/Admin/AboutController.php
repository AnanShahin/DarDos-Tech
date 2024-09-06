<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $about = About::first();

        return view('admin.about.index')->with(compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description_en' => 'nullable',
            'description_ar' => 'nullable',
            'title_en'=> 'nullable',
            'title_ar'=> 'nullable',
            'image' => 'nullable',
        ]);

        $about = About::first();

        if (!$about) {
            $about = new About();
        }

        $removeImage = $request->has('remove_image') && $request->input('remove_image') == 1;

        if ($removeImage) {
            if ($about && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
                $about->image = null;
            }
        } else {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $imageFilename = time() .'.'. $ext;
                $imageUploadPath = 'uploads/about/image/';
                $file->move($imageUploadPath, $imageFilename);
                $about->image = $imageUploadPath . $imageFilename;
            }
        }

        $about->description_en = $request->description_en;
        $about->description_ar = $request->description_ar;
        $about->title_en = $request->title_en;
        $about->title_ar = $request->title_ar;
        $about->save();

        return redirect()->route('about.index')->with('status-success', 'About updated/created successfully.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
