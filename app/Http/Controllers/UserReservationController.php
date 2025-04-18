<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\WebReservation;
use App\Models\Interview;

class UserReservationController extends Controller
{
    
    public function index(Request $request)
    {   
        $is_hidden = 0;
        $webReservations = WebReservation::where(['user_id'=>Auth::id()])->orderBy('id', 'DESC')->get();
        return view('user.reception', compact('webReservations', 'is_hidden'));
    }

    public function save(Request $request)
    {
        $request->validate([ 
            'name' => 'required',
            'mail' => 'required',
            'tel' => 'required'  
        ]);

        WebReservation::create([
            'name' => $request->name,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function getById(Request $request)
    {
        $webReservations = WebReservation::where(['id'=>$request->id])->first();
        return response()->json($webReservations);
    }

    public function delete(Request $request)
    {
        WebReservation::where(['id'=>$request->id])->delete();
        return redirect()->back()->with('success', __('Save Changes'));
    }
    
    public function compatible(Request $request)
    {
        WebReservation::where(['id'=>$request->id])->update(['compatible'=>$request->value]);
        return response()->json(['status'=>1, "message"=>"__('Save Changes')" ]);
    }

    public function interview(Request $request)
    {
        if(!empty($request->is_hidden) && $request->is_hidden == 1){
            $is_hidden = 1;
            $interviews = Interview::whereIn('compatible',[0,1,2])->orderBy('id', 'DESC')->get();
            return view('admin.interview.list', compact('interviews', 'is_hidden'));
        }else{
            $is_hidden = 0;
            $interviews = Interview::whereIn('compatible',[0,1])->orderBy('id', 'DESC')->get();
            return view('admin.interview.list', compact('interviews', 'is_hidden'));
        }
    }

    public function getInterviewById(Request $request)
    {
        $interview = Interview::where(['id'=>$request->id])->first();
        return response()->json($interview);
    }

    
    public function int_delete(Request $request)
    {
        Interview::where(['id'=>$request->id])->delete();
        return redirect()->back()->with('success', __('Save Changes'));
    }

    
    public function int_compatible(Request $request)
    {
        Interview::where(['id'=>$request->id])->update(['compatible'=>$request->value]);
        return response()->json(['status'=>1, "message"=>"__('Save Changes')" ]);
    }

}
