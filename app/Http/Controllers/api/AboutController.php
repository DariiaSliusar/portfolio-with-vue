<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::latest()->first();
        return response()->json([
            'about' => $about
        ], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $about = About::latest()->first();
        $about->name = $request->name;
        $about->email = $request->email;
        $about->phone = $request->phone;
        $about->address = $request->address;
        $about->description = $request->description;
        $about->summary = $request->summary;
        $about->tagline = $request->tagline;

        // Handle home image
        if ($request->hasFile('home_image')) {
            $oldImage = public_path("/uploads/") . $about->home_image;
            if ($about->home_image && file_exists($oldImage)) {
                @unlink($oldImage);
            }
            $home_image = $request->file('home_image');
            $home_image_name = time() . '_home.' . $home_image->getClientOriginalExtension();
            $home_image->move(public_path('uploads/'), $home_image_name);
            $about->home_image = $home_image_name;
        }

        // Handle banner image
        if ($request->hasFile('banner_image')) {
            $oldBanner = public_path("/uploads/") . $about->banner_image;
            if ($about->banner_image && file_exists($oldBanner)) {
                @unlink($oldBanner);
            }
            $banner_image = $request->file('banner_image');
            $banner_image_name = time() . '_banner.' . $banner_image->getClientOriginalExtension();
            $banner_image->move(public_path('uploads/'), $banner_image_name);
            $about->banner_image = $banner_image_name;
        }

        // Handle CV
        if ($request->hasFile('cv')) {
            $oldCv = public_path("/uploads/") . $about->cv;
            if ($about->cv && file_exists($oldCv)) {
                @unlink($oldCv);
            }
            $cv = $request->file('cv');
            $cv_name = time() . '_cv.' . $cv->getClientOriginalExtension();
            $cv->move(public_path('uploads/'), $cv_name);
            $about->cv = $cv_name;
        }

        $about->save();

        return response()->json([
            'message' => 'About updated successfully',
            'about' => $about
        ], 200);
    }
}
