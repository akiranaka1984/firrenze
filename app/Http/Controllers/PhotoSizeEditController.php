<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PhotoCategory;
use App\Models\PhotoSizeSetting;


class PhotoSizeEditController extends Controller
{
    public function index(Request $request)
    {
        $categories = PhotoCategory::where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        $photoSizeSettings = PhotoSizeSetting::where(['status'=>1])->get();

        return view('admin.photo_size.edit', compact('categories', 'photoSizeSettings'));
    }

    public function save(Request $request)
    {
        $request->validate([ 
            'category_id' => 'required', 
            'setting_name' => 'required', 
            'setting_kana' => 'required', 
            'setting_prefix' => 'required'
        ]);

        PhotoSizeSetting::create([
            'name' => $request->setting_name,
            'kana' => $request->setting_kana,
            'category_id' => $request->category_id,
            'hpx' => $request->setting_hpx,
            'vpx' => $request->setting_vpx,
            'prefix' => $request->setting_prefix,
            'status' => 1
        ]);

        return redirect()->back()->with('success', __('Save Changes'));

    }
    
    public function update(Request $request)
    {

        $request->validate([ 
            'id' => 'required', 
            'category_id' => 'required', 
            'setting_name' => 'required', 
            'setting_prefix' => 'required'
        ]);


        PhotoSizeSetting::where([ 'id'=>$request->id ])->update([
            'name' => $request->setting_name,
            'category_id' => $request->category_id,
            'hpx' => $request->setting_hpx,
            'vpx' => $request->setting_vpx,
            'prefix' => $request->setting_prefix
        ]);

        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function delete(Request $request)
    {
        PhotoSizeSetting::where(['id'=>$request->id])->update(['status'=>0]);
        return redirect()->back()->with('success', __('Save Changes'));
    }

}
