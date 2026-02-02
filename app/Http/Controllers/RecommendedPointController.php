<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecommendedPoint;

class RecommendedPointController extends Controller
{
    public function index(Request $request)
    {
        $recommendedPoints = RecommendedPoint::where(['status' => 1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        return view('admin.recommended_point.list', compact('recommendedPoints'));
    }

    public function save(Request $request)
    {
        $request->validate(['name' => 'required']);

        if (empty($request->id)) {
            $count = RecommendedPoint::max('position');
            RecommendedPoint::create(['name' => $request->name, 'position' => ($count + 1)]);
            return redirect()->back()->with('success', __('Save Changes'));
        } else {
            RecommendedPoint::where(['id' => $request->id])->update(['name' => $request->name]);
            return redirect()->back()->with('success', __('Save Changes'));
        }
    }

    public function delete(Request $request)
    {
        RecommendedPoint::where(['id' => $request->id])->update(['status' => 0, 'position' => 0]);
        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function position(Request $request)
    {
        RecommendedPoint::where('id', '>', 0)->update(['position' => 0]);
        foreach ($request->data as $key => $data) {
            RecommendedPoint::where(['id' => $key])->update(['position' => $data]);
        }

        return response()->json(['status' => 1, 'message' => 'success']);
    }
}
