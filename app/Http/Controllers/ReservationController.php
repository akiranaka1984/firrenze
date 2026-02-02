<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        Log::info('Save method called');
        Log::info('Request data:', $request->all());

        $request->validate([
            'name' => 'required',
            'mail' => 'required|email',
            'tel' => 'required',
            'lineid' => 'nullable',
            'lady1' => 'nullable',
            'lady2' => 'nullable',
            'lady3' => 'nullable',
            'cource' => 'nullable',
            'place' => 'nullable',
            'pay' => 'nullable',
            'contact' => 'nullable',
            'cmnt' => 'nullable',
            'first_reservation_month' => 'nullable|integer',
            'first_reservation_date' => 'nullable|integer',
            'first_reservation_hour' => 'nullable|integer',
            'first_reservation_minute' => 'nullable',
            'second_reservation_month' => 'nullable|integer',
            'second_reservation_date' => 'nullable|integer',
            'second_reservation_hour' => 'nullable|integer',
            'second_reservation_minute' => 'nullable',
            'third_reservation_month' => 'nullable|integer',
            'third_reservation_date' => 'nullable|integer',
            'third_reservation_hour' => 'nullable|integer',
            'third_reservation_minute' => 'nullable',
        ]);

        // 各候補日をdatetimeに変換
        $year = date('Y');
        $date1 = null;
        $date2 = null;
        $date3 = null;

        if ($request->first_reservation_month && $request->first_reservation_date) {
            $date1 = sprintf('%04d-%02d-%02d %02d:%02d:00',
                $year, $request->first_reservation_month, $request->first_reservation_date,
                $request->first_reservation_hour ?? 0, $request->first_reservation_minute ?? 0);
        }
        if ($request->second_reservation_month && $request->second_reservation_date) {
            $date2 = sprintf('%04d-%02d-%02d %02d:%02d:00',
                $year, $request->second_reservation_month, $request->second_reservation_date,
                $request->second_reservation_hour ?? 0, $request->second_reservation_minute ?? 0);
        }
        if ($request->third_reservation_month && $request->third_reservation_date) {
            $date3 = sprintf('%04d-%02d-%02d %02d:%02d:00',
                $year, $request->third_reservation_month, $request->third_reservation_date,
                $request->third_reservation_hour ?? 0, $request->third_reservation_minute ?? 0);
        }

        WebReservation::create([
            'user_id' => $request->input('frm_user_id'),
            'name' => $request->input('name'),
            'mail' => $request->input('mail'),
            'tel' => $request->input('tel'),
            'lineid' => $request->input('lineid'),
            'lady1' => $request->input('lady1'),
            'lady2' => $request->input('lady2'),
            'lady3' => $request->input('lady3'),
            'date1' => $date1,
            'date2' => $date2,
            'date3' => $date3,
            'cource' => $request->input('cource'),
            'place' => $request->input('place'),
            'pay' => $request->input('pay'),
            'contact' => $request->input('contact'),
            'cmnt' => $request->input('cmnt'),
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
            $data = $webReservation->toArray();
            // コンパニオンIDを名前に変換
            foreach (['lady1', 'lady2', 'lady3'] as $field) {
                if (!empty($data[$field])) {
                    $companion = Companion::find($data[$field]);
                    $data[$field] = $companion ? $companion->name : $data[$field];
                }
            }
            return response()->json($data);
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
