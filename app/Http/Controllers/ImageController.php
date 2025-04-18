<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Pages;
use App\Models\Companion;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Price;
use App\Models\Gallery;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Gallery::orderBy('id','DESC')->paginate(100)->appends(request()->query());
        return view('admin.gallery.list', compact('galleries'));
    }

    public function upload(Request $request)
    {
        
        if($request->hasfile('photos')){ 
            $request->validate([
                'photos' => 'required',
                'photos.*' => 'mimes:jpeg,png,jpg|max:20480'
            ]);

            foreach($request->file('photos') as $file)
            {
                $imageName = rand('1111','9999').time().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->put('gallery/'.$imageName, file_get_contents($file), 'public');
                Gallery::create(['filename' => url('/storage/gallery/'.$imageName)]);
            }
        }

        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function delete(Request $request)
    {
        Gallery::where(['id'=>$request->id])->delete();
        return redirect()->back()->with('success', __('Save Changes'));
    }

}
