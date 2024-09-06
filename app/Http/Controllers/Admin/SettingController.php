<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $settings = Setting::first();

        return view('admin.setting.index')->with(compact('settings'));
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
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
            'linkedin' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
            'key_words' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'logo' => 'nullable',
            'address' => 'nullable',
            'url' => 'nullable',
            'contact_email' => 'nullable',
            'carrers_email' => 'nullable',
            'working_time' => 'nullable',
            'working_days' => 'nullable',
        ]);

        // Handle logo upload and removal
        $setting = Setting::firstOrNew();

        if ($request->has('remove_logo') && $request->input('remove_logo') == 1) {
            if ($setting->logo && file_exists(public_path($setting->logo))) {
                unlink(public_path($setting->logo));
                $setting->logo = null;
            }
        } elseif ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $logoFilename = 'logo_' . time() . '.' . $ext;
            $logoUploadPath = 'uploads/site/logos/';
            $file->move($logoUploadPath, $logoFilename);
            $setting->logo = $logoUploadPath . $logoFilename;
        }

        // Handle image upload and removal
        if ($request->has('remove_image') && $request->input('remove_image') == 1) {
            if ($setting->image && file_exists(public_path($setting->image))) {
                unlink(public_path($setting->image));
                $setting->image = null;
            }
        } elseif ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageFilename = 'image_' . time() . '.' . $ext;
            $imageUploadPath = 'uploads/site/images/';
            $file->move($imageUploadPath, $imageFilename);
            $setting->image = $imageUploadPath . $imageFilename;
        }

        // Save other fields to the setting model
        $setting->fill($request->except(['_token', 'remove_logo', 'remove_image', 'logo', 'image']));
        $setting->save();

        return redirect()->route('settings.index')->with('status-success', 'Settings updated/created successfully.');
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

        // if ($request->has('removed_logo')) {
        //     $removedlogo = $request->input('removed_logo');
        //     $logoToDelete = WebsiteSetting::findOrFail($removedlogo);
        //     Storage::delete($logoToDelete->logo);
        //     $logoToDelete->delete();
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
