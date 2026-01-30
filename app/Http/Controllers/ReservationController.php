<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebReservation;
use App\Models\Interview;
use App\Models\Companion;
use App\Models\Category;

class ReservationController extends Controller
{
    
    public function index(Request $request)
    {   
        if(!empty($request->is_hidden) && $request->is_hidden == 1){
            $is_hidden = 1;
            $webReservations = WebReservation::whereIn('compatible',[0,1,2])->orderBy('id', 'DESC')->get();
            return view('admin.reception.list', compact('webReservations', 'is_hidden'));
        }else{
            $is_hidden = 0;
            $webReservations = WebReservation::whereIn('compatible',[0,1])->orderBy('id', 'DESC')->get();
            return view('admin.reception.list', compact('webReservations', 'is_hidden'));
        }
    }

    public function save(Request $request)
{
    Log::info('Save method called'); // リクエストがここに届いたことを確認するログ
    Log::info('Request data:', $request->all()); // 送信されたデータを確認

    $request->validate([ 
        'name' => 'required',
        'mail' => 'required|email',
        'tel' => 'required',
        'lineid' => 'nullable',
        'lady1' => 'nullable',
        'lady2' => 'nullable',
        'lady3' => 'nullable',
        'date1' => 'nullable|date',
        'date2' => 'nullable|date',
        'date3' => 'nullable|date',
        'cource' => 'nullable',
        'place' => 'nullable',
        'pay' => 'nullable',
        'contact' => 'nullable',
        'cmnt' => 'nullable',
        'reservation_month' => 'nullable',
        'reservation_date' => 'nullable',
        'reservation_hour' => 'nullable',
        'reservation_minute' => 'nullable'
    ]);

    WebReservation::create([
        'name' => $request->input('name'),
        'mail' => $request->input('mail'),
        'tel' => $request->input('tel'),
        'lineid' => $request->input('lineid'),
        'lady1' => $request->input('lady1'),
        'lady2' => $request->input('lady2'),
        'lady3' => $request->input('lady3'),
        'date1' => $request->input('date1'),
        'date2' => $request->input('date2'),
        'date3' => $request->input('date3'),
        'cource' => $request->input('cource'),
        'place' => $request->input('place'),
        'pay' => $request->input('pay'),
        'contact' => $request->input('contact'),
        'cmnt' => $request->input('cmnt'),
        'reservation_month' => $request->input('reservation_month'),
        'reservation_date' => $request->input('reservation_date'),
        'reservation_hour' => $request->input('reservation_hour'),
        'reservation_minute' => $request->input('reservation_minute'),
    ]);

    return redirect()->back()->with('success', __('変更が保存されました'));
}

    public function getById(Request $request)
    {
        try {
            $webReservation = WebReservation::where(['id'=>$request->id])->first();
            if (!$webReservation) {
                return response()->json(['error' => 'Reservation not found'], 404);
            }
            return response()->json($webReservation);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
        $interviews = Interview::whereIn('compatible',[0,1,2])
            ->orderBy('updated_at', 'DESC')  // created_atに変更
            ->orderBy('id', 'DESC')           // 念のためidでも降順
            ->get();
        return view('admin.interview.list', compact('interviews', 'is_hidden'));
    }else{
        $is_hidden = 0;
        $interviews = Interview::whereIn('compatible',[0,1])
            ->orderBy('created_at', 'DESC')  // created_atに変更
            ->orderBy('id', 'DESC')           // 念のためidでも降順
            ->get();
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
