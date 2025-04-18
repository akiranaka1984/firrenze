<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Companion;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{

    public function index(Request $request)
    {
        // タイムゾーンを日本時間に設定
        $now = Carbon::now('Asia/Tokyo');
    
        // 日付切り替え: 午前5時を基準
        // 通常は今日の日付を計算
        $defaultDate = $now->hour < 5 ? $now->copy()->subDay()->format('Y-m-d') : $now->format('Y-m-d');
        // リクエストに selected_date があればそれを使い、なければ今日の日付を使う
        $currentDate = $request->get('selected_date', session('selected_date', $defaultDate));
    
        // 現在から1週間分の日付を生成
        $schedule_dates = [];
        for ($i = 0; $i < 7; $i++) {
            $schedule_dates[] = Carbon::parse($currentDate)->addDays($i)->format('Y-m-d');
        }
    
        // コンパニオンリスト取得
        $companionLists = Companion::select('id', 'name', 'age')
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();
    
        // ビューにデータを渡す
        return view('admin.attendance.list', compact('companionLists', 'schedule_dates', 'currentDate'));
    }


    public function api(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $attendance = Attendance::selectRaw('date, count(id) AS count')
        ->where('date','>=',$startDate)
        ->where('date','<=',$endDate)
        ->groupBy('date')
        ->get();

        return response()->json($attendance);
    }

    public function details(Request $request)
    {
        $attendance = Attendance::with(['companion' => function ($query) {
            $query->orderBy('updated_at', 'desc')->orderBy('id', 'desc'); // モデル一覧のソート順
    }])
    ->where('date', '=', $request->selectedDate)
    ->get();

    return response()->json($attendance);
}

    public function save(Request $request)
    {
        $undetermined_hours = !empty($request->undetermined_hours) ? 1 : 0;
        $hidden_hours = !empty($request->hidden_hours) ? 1 : 0;
        $without_end_time_display = !empty($request->without_end_time_display) ? 1 : 0;
    
        // 既存レコードがあるかチェック
        $attendance = Attendance::where('companion_id', $request->companion_id)
            ->where('date', $request->selected_date)
            ->first();
    
        if ($attendance) {
            // 更新の場合は position を変更せず、その他の項目だけ更新する
            $attendance->update([
                'start_time' => $request->start_time,
                'end_time'  => $request->end_time,
                'undetermined_hours' => $undetermined_hours,
                'hidden_hours' => $hidden_hours,
                'without_end_time_display' => $without_end_time_display,
                'message' =>  $request->message,
            ]);
        } else {
            // 新規登録の場合は、新しい position を設定する
            $count = Attendance::max('position');
            Attendance::create([
                'companion_id' => $request->companion_id,
                'date' => $request->selected_date,
                'start_time' => $request->start_time,
                'end_time'  => $request->end_time,
                'undetermined_hours' => $undetermined_hours,
                'hidden_hours' => $hidden_hours,
                'without_end_time_display' => $without_end_time_display,
                'message' =>  $request->message,
                'position' => ($count + 1)
            ]);
        }
    
        return redirect()->back()->with('success', __('Save Changes'))->with('selected_date', $request->selected_date);
    }

    public function delete(Request $request)
    {
        Attendance::where(['id' => $request->id])->delete();
        return response()->json(['status'=>1,'message'=>__('Save Changes')]);
    }

    public function position(Request $request)
    {
        Attendance::where('date','=', $request->date)->update(['position'=>0]);
        foreach($request->data as $key => $data){
            Attendance::where(['id'=>$key])->update(['position'=>$data]);
        }

        return response()->json(['status' => 1, 'message' => 'success']);
    }

    public function bulk(Request $request)
{
    $jadays = array('月','火','水','木','金','土','日');

    $xdates['today'] = date('Y-m-d');
    $xdates['next1'] = date('Y-m-d', strtotime($xdates['today']. ' + 1 days'));
    $xdates['next2'] = date('Y-m-d', strtotime($xdates['today']. ' + 2 days'));
    $xdates['next3'] = date('Y-m-d', strtotime($xdates['today']. ' + 3 days'));
    $xdates['next4'] = date('Y-m-d', strtotime($xdates['today']. ' + 4 days'));
    $xdates['next5'] = date('Y-m-d', strtotime($xdates['today']. ' + 5 days'));
    $xdates['next6'] = date('Y-m-d', strtotime($xdates['today']. ' + 6 days'));
    $xdates['next7'] = date('Y-m-d', strtotime($xdates['today']. ' + 7 days'));
    // 8日目（9日間目）を追加
    $xdates['next8'] = date('Y-m-d', strtotime($xdates['today']. ' + 8 days'));

    $jadates['today'] = date('m/d').'('.$jadays[date('N')-1].')';
    $jadates['next1'] = date('m/d', strtotime($xdates['next1'])).'('.$jadays[date('N', strtotime($xdates['next1']))-1].')';
    $jadates['next2'] = date('m/d', strtotime($xdates['next2'])).'('.$jadays[date('N', strtotime($xdates['next2']))-1].')';
    $jadates['next3'] = date('m/d', strtotime($xdates['next3'])).'('.$jadays[date('N', strtotime($xdates['next3']))-1].')';
    $jadates['next4'] = date('m/d', strtotime($xdates['next4'])).'('.$jadays[date('N', strtotime($xdates['next4']))-1].')';
    $jadates['next5'] = date('m/d', strtotime($xdates['next5'])).'('.$jadays[date('N', strtotime($xdates['next5']))-1].')';
    $jadates['next6'] = date('m/d', strtotime($xdates['next6'])).'('.$jadays[date('N', strtotime($xdates['next6']))-1].')';
    $jadates['next7'] = date('m/d', strtotime($xdates['next7'])).'('.$jadays[date('N', strtotime($xdates['next7']))-1].')';
    // 8日目（9日間目）を追加
    $jadates['next8'] = date('m/d', strtotime($xdates['next8'])).'('.$jadays[date('N', strtotime($xdates['next8']))-1].')';

    $sql = Companion::with([
        'home_image',
        'attendances' => function ($query) {
            $query->orderBy('updated_at', 'desc')->orderBy('id', 'desc');
        }
    ])->where('status', 1);

    $search_q = "";
    if (!empty($request->search_q)) {
        $search_q = $request->search_q;
        $sql->where(function ($query) use ($search_q) {
            $query->where('name', 'like', '%' . $search_q . '%')
                ->orWhere('kana', 'like', '%' . $search_q . '%')
                ->orWhere('celebrities_who_look_alike', 'like', '%' . $search_q . '%');
        });
    }

    $companions = $sql->orderBy('position', 'ASC')->orderBy('id', 'ASC')->paginate(15)->appends(request()->query());

    // リレーションの手動ソート
    foreach ($companions as $companion) {
        $companion->setRelation('attendances', $companion->attendances->sortByDesc('updated_at')->sortByDesc('id'));
    }

    return view('admin.attendance.bulk', compact('xdates', 'jadates', 'search_q', 'companions'));
}

    public function bulk_save(Request $request)
    {

        $undetermined_hours = ($request->undetermined_hours == true) ? 1 : 0;
        $hidden_hours = ($request->hidden_hours == true) ? 1 : 0;
        $without_end_time_display = ($request->without_end_time_display == true) ? 1 : 0;

        Attendance::updateOrInsert([
            'companion_id' => $request->companion,
            'date' => $request->date,
        ],[
            'start_time' => $request->start_date,
            'end_time'  => $request->end_date,
            'undetermined_hours' => $undetermined_hours,
            'hidden_hours' => $hidden_hours,
            'without_end_time_display' => $without_end_time_display
        ]);

        $attendance = Attendance::where(['companion_id' => $request->companion,'date' => $request->date])->first();
        if($attendance->position == 0){
            $attendance->position = ((Attendance::where(['date' => $request->date])->max('position'))+1);
            $attendance->save();
        }

        return response()->json(['status' => 1, 'message' => __('Save Changes')]);
    }

}
