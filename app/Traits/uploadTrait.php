<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait uploadTrait
{
    public function uploadimage(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type)
    {
        if ($request->hasFile($inputname)) {
            // check img 
            if (!$request->file($inputname)->isValid()) {
                flash('invalid_image')->error()->important();
                return redirect()->back()->withInput();
            }
            $photo = $request->file($inputname);
            $name = Str::slug($request->input('name'));
            $filename = $name . '.' . $photo->getClientOriginalExtension();
            // insert image

            $Image = new Image();
            $Image->filename = $filename;
            $Image->imageable_id = $imageable_id;
            $Image->imageable_type = $imageable_type;
            $Image->save();
            return redirect()->file($inputname)->storeAs($foldername, $filename, $disk);
        }
    }
}
