<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Logクラスのインポート
use Jenssegers\Agent\Agent;
use Carbon\Carbon;  // Carbonライブラリをインポート
use App\Models\Pages;
use App\Models\Companion;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Price;
use App\Models\AttendanceNotice;
use App\Models\MailMagazine;
use App\Models\WebReservation;
use App\Models\Interview;

// ここに追加
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationNotification;

use App\Jobs\RecruitmentToApplicantJob;
use App\Jobs\RecruitmentToStoreJob;
use App\Models\Contact;
use App\Models\News;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $main = Pages::where(['name'=>'main'])->first();
        $campaign = Pages::where(['name'=>'campaign'])->first();
    
        // 新しいコンパニオン情報
        $new_companions = Companion::with(['today_attendances','home_image', 'category'])
            ->where(['status'=>1])
            ->orderBy('id', 'DESC')
            ->take(6)
            ->get();
    
        // 今日の出勤情報を position 順で並び替え（午前5時基準）
        $now = Carbon::now('Asia/Tokyo');
        $currentDate = $now->hour < 5 ? $now->subDay()->format('Y-m-d') : $now->format('Y-m-d');
    
        $today_attendances = Attendance::with(['companion'])
            ->where(['date' => $currentDate])
            ->orderBy('position', 'asc')
            ->get();
    
        // 明日の出勤情報
        $tomorrow_attendances = Attendance::with(['companion'])
            ->where(['date' => date('Y-m-d', strtotime('+1 days'))])
            ->get();
    
        // 最近のニュース
        $recent_news = News::where('status', 1)
                        ->orderBy('id', 'DESC')
                        ->first(); // 最新の1件だけ取得
                    
        $latest_news = News::where('status', 1) // status = 1 のみ取得
                    ->orderBy('id', 'DESC')
                    ->first(); // 最新の1件を取得
    
        // 1ヶ月以内に登録されたコンパニオン情報
        $oneMonthAgo = Carbon::today()->subMonth();
        $new_companions2 = Companion::with(['home_image', 'category'])
            ->where('entry_date', '>=', $oneMonthAgo)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->take(20)
            ->get();
    
        return view('page.index', compact(
            'header', 'footer', 'main', 'campaign',
            'new_companions2', 'today_attendances',
            'tomorrow_attendances', 'recent_news'
        ));
    }

    public function concept(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $concept = Pages::where(['name'=>'concept'])->first();
        return view('page.concept', compact('header','footer','concept'));
    }

    public function details(Request $request)
    {
        $schedule_dates = $this->weekly_dates();
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $companion = Companion::with(['category','home_image', 'all_images', 'attendances'])->where(['id'=>$request->id ])->first();
        return view('page.details', compact('header','footer', 'schedule_dates', 'companion'));
    }

    public function attendance_sheet(Request $request)
    {
        $now = Carbon::now('Asia/Tokyo');
    
        // 午前5時を基準に日付を計算
        if ($now->hour < 5) {
            $currentDate = $now->copy()->subDay()->format('Y-m-d');
        } else {
            $currentDate = $now->format('Y-m-d');
        }
    
        // 日本語の曜日名の配列
        $japanese_days = ['日', '月', '火', '水', '木', '金', '土'];
    
        $schedule_dates = [];
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::parse($currentDate)->addDays($i);
            $day_of_week = $japanese_days[$date->dayOfWeek]; // 日本語の曜日を取得
            $schedule_dates[$date->format('Y-m-d')] = $date->format('m/d') . '(' . $day_of_week . ')';
        }
    
        $req_date = $request->query('date', $currentDate);
    
        $header = Pages::where(['name' => 'header'])->first();
        $footer = Pages::where(['name' => 'footer'])->first();
        $attendance_sheet = Pages::where(['name' => 'attendance_sheet'])->first();
    
        // 出勤データを position でソートして取得
        $today_attendances = Attendance::with(['companion'])
            ->where(['date' => $req_date])
            ->orderBy('position', 'asc') // position で昇順ソート
            ->get();
    
        return view('page.attendance_sheet', compact('header', 'footer', 'req_date', 'attendance_sheet', 'schedule_dates', 'today_attendances'));
    }



    public function enrollmentTable()
{
    return view('enrollment_table');
}


    public function enrollment_table(Request $request)
{
    // デバイス判定用のインスタンス作成
    $agent = new Agent();
    $isMobile = $agent->isMobile();

    $header = Pages::where(['name' => 'header'])->first();
    $footer = Pages::where(['name' => 'footer'])->first();
    $enrollment_table = Pages::where(['name' => 'enrollment_table'])->first();

    // 全体のデータを取得
    $companions = Companion::with(['today_attendances', 'category', 'home_image'])
        ->where('status', 1);

    // 年齢フィルタリング
    $companions->where(function ($query) use ($request) {
        if (!empty($request->search_age18)) {
            $query->orWhere(function ($query1) {
                $query1->where('age', '>=', 18)->where('age', '<=', 19);
            });
        }
        if (!empty($request->search_age20)) {
            $query->orWhere(function ($query1) {
                $query1->where('age', '>=', 20)->where('age', '<=', 24);
            });
        }
        if (!empty($request->search_age25)) {
            $query->orWhere(function ($query1) {
                $query1->where('age', '>=', 25)->where('age', '<=', 29);
            });
        }
        if (!empty($request->search_age30)) {
            $query->orWhere('age', '>=', 30);
        }
    });

    // 身長フィルタリング
    $companions->where(function ($query) use ($request) {
        if (!empty($request->search_height149)) {
            $query->orWhere('height', '<=', 149);
        }
        if (!empty($request->search_height150)) {
            $query->orWhere(function ($query1) {
                $query1->where('height', '>=', 150)->where('height', '<=', 154);
            });
        }
        if (!empty($request->search_height155)) {
            $query->orWhere(function ($query1) {
                $query1->where('height', '>=', 155)->where('height', '<=', 159);
            });
        }
        if (!empty($request->search_height160)) {
            $query->orWhere(function ($query1) {
                $query1->where('height', '>=', 160)->where('height', '<=', 164);
            });
        }
        if (!empty($request->search_height165)) {
            $query->orWhere(function ($query1) {
                $query1->where('height', '>=', 165)->where('height', '<=', 169);
            });
        }
        if (!empty($request->search_height170)) {
            $query->orWhere('height', '>=', 170);
        }
    });

    // バストサイズフィルタリング
    $companions->where(function ($query) use ($request) {
        if (!empty($request->search_bust_a)) {
            $query->orWhere('cup', '=', 'A');
        }
        if (!empty($request->search_bust_b)) {
            $query->orWhere('cup', '=', 'B');
        }
        if (!empty($request->search_bust_c)) {
            $query->orWhere('cup', '=', 'C');
        }
        if (!empty($request->search_bust_d)) {
            $query->orWhere('cup', '=', 'D');
        }
        if (!empty($request->search_bust_e)) {
            $query->orWhere('cup', '=', 'E');
        }
        if (!empty($request->search_bust_f)) {
            $query->orWhere('cup', '=', 'F');
        }
        if (!empty($request->search_bust_g)) {
            $query->orWhere('cup', '=', 'G');
        }
        if (!empty($request->search_bust_h)) {
            $query->orWhere('cup', '=', 'H');
        }
    });

    // 名前検索フィルタリング
    if (!empty($request->girls_search_text)) {
        $companions->where('name', 'like', '%' . $request->girls_search_text . '%');
    }

    // データをソートして取得
    //$companions = $companions->orderBy('updated_at', 'desc')->orderBy('id', 'desc')->get();
    // データをソートして取得
    // データをソートして取得
    $companions = $companions->orderBy('position', 'asc')->get();
    if ($isMobile) {
    // リクエストに "page" パラメータがあり、1でなければリダイレクトしてページ番号をリセット
        if (request()->has('page') && request()->get('page') != 1) {
            return redirect(url()->current());
        }
        // モバイル: 全てのデータを1ページで表示
        $paginatedCompanions = new LengthAwarePaginator(
            $companions,
            $companions->count(),
            $companions->count(),
            1, // 常に1ページ目
            ['path' => url()->current()]
        );
    } else {
        // PC: 全てのデータを1ページで表示
        $paginatedCompanions = new LengthAwarePaginator(
            $companions,
            $companions->count(),
            $companions->count(),
            1,
            ['path' => url()->current()]
        );
    }


    $search_param = (object) $request->all();

    return view('page.enrollment_table', compact('header', 'footer', 'search_param', 'enrollment_table', 'paginatedCompanions'));
}


    public function price(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $priceData = Pages::where(['name'=>'price'])->first();
        // dd($price->text_data2);
        $categories = Category::with(['prices'])->where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        return view('page.price', compact('header','footer', 'priceData', 'categories'));
    }

    public function news(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $event = Pages::where(['name'=>'event'])->first();
        if ($request->year) {
            $news_data = News::whereYear('created_at', $request->year)->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $news_data = News::orderBy('created_at', 'desc')->paginate(10);
        }
        $years = News::selectRaw('YEAR(created_at) as year')->groupBy('year')->orderBy('year', 'desc')->get();
        return view('page.news', compact('header','footer', 'event', 'news_data', 'years'));
    }

    public function news_details(Request $request, $slug)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $event = Pages::where(['name'=>'event'])->first();
        $news_detail = News::where('slug', $slug)->first();
        return view('page.news-details', compact('header','footer', 'event', 'news_detail'));
    }

    function weekly_dates()
    {
        $schedule_dates = array();
        for ($i=0; $i < 7; $i++) {
            $days = date('l', strtotime('+'.$i.' days'));
            $dayname="";
            if ($days == "Sunday") {
                $dayname = "日";
            }else if ($days == "Monday") {
                $dayname = "月";
            }else  if ($days == "Tuesday") {
                $dayname = "火";
            }else if ($days == "Wednesday") {
                $dayname = "水";
            }else  if ($days == "Thursday") {
                $dayname = "木";
            }else  if ($days == "Friday") {
                $dayname = "金";
            } else {
                $dayname = "土";
            }
            if($i == 0){
                $schedule_dates[date('Y-m-d', strtotime('+'.$i.' days'))] = "".date('m月d日', strtotime('+'.$i.' days'))."(".$dayname.")";
            }else{
                $schedule_dates[date('Y-m-d', strtotime('+'.$i.' days'))] = date('m月d日', strtotime('+'.$i.' days'))."(".$dayname.")";
            }
        }

        return $schedule_dates;
    }

    public function privacy_policy(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $privacy_policy = Pages::where(['name'=>'privacy_policy'])->first();
        return view('page.privacy_policy', compact('header','footer', 'privacy_policy'));
    }

    public function magazine(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        return view('page.magazine', compact('header','footer'));
    }

    public function magazine_save(Request $request)
    {
        if(!empty($request->castsyukkinmail_add)){
            MailMagazine::updateOrInsert(
                [
                    'email' => $request->email
                ],
                [
                    'name'=>$request->name,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
            return redirect()->back()->with('success', __('Save Changes'));
        }else{
            MailMagazine::where(['email' => $request->email])->delete();
            return redirect()->back()->with('success', __('Successfully deleted'));
        }
    }

    public function contact(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        return view('page.contact', compact('header','footer'));
    }

    public function contact_save(Request $request)
        {
            // バリデーション追加
            $request->validate([
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ]);
        
            Contact::create([
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message ?? '' // null の場合は空文字
            ]);
            
            return redirect()->back()->with('success', __('Save Changes'));
        }

    public function recruit(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $recruit = Pages::where(['name'=>'entry'])->first();
        $month=date('m');
        $day = date('d');
        return view('page.recruit', compact('header','footer', 'recruit', 'month', 'day'));
    }

    public function recruit_save(Request $request)
    {
        Log::info('Recruit Save: Start processing', $request->all());
    
        $request->validate([
            'name' => 'required|string',
            'mail' => 'required|email',
            'mail2' => 'required|same:mail',
            'tel' => 'required|string',
            'interview_month' => 'required|integer',
            'interview_date' => 'required|integer',
            'interview_hour' => 'required|integer',
            'interview_minute' => 'required|integer',
        ]);
    
        Log::info('Validation passed');
    
        $imageName = $this->handleImageUpload($request->file('photo'));
    
        if ($imageName) {
            Log::info('Photo uploaded successfully', ['imageName' => $imageName]);
        } else {
            Log::info('No photo uploaded or upload failed');
        }
    
        $interviewDate = sprintf(
            '%04d-%02d-%02d %02d:%02d:00',
            now()->year,
            $request->interview_month,
            $request->interview_date,
            $request->interview_hour,
            $request->interview_minute
        );
    
        Log::info('Interview date formatted', ['interviewDate' => $interviewDate]);
    
        try {
            Log::info('Saving interview data...', [
                'photo' => $imageName,
                'data' => [
                    'name' => $request->name,
                    'tel' => $request->tel,
                    'photo' => $imageName,
                    'interview_date' => $interviewDate,
                ],
            ]);
    
            $interview = Interview::updateOrCreate(
                ['mail' => $request->mail],
                [
                    'name' => $request->name,
                    'tel' => $request->tel,
                    'line_id' => $request->lineid,
                    'age' => $request->age,
                    'height' => $request->height,
                    'weight' => $request->weight,
                    'bust' => $request->bust,
                    'tattoo' => $request->tattoo ?? null,
                    'photo' => $imageName,
                    'interview_date' => $interviewDate,
                    'inquiry' => $request->require,
                    'other_message' => $request->inquiry,
                    'appealing_points' => '',
                ]
            );
    
            Log::info('Interview saved successfully', ['interview' => $interview]);
        } catch (\Exception $e) {
            Log::error('Error saving interview', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', __('An error occurred while saving the interview.'));
        }
    
        Log::info('Redirecting to /recruit');
        return redirect('/recruit')->with('success', __('Save Changes'));
    }
    
    /**
     * 画像アップロード処理
     *
     * @param UploadedFile|null $file
     * @return string|null
     */
    private function handleImageUpload($file)
    {
        if (!$file) {
            Log::info('No file provided for upload');
            return null;
        }
    
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); // ユニークなファイル名生成
    
        try {
            Storage::disk('public')->put('photos/interview/' . $fileName, file_get_contents($file));
            Log::info('File successfully uploaded', ['path' => 'photos/interview/' . $fileName]);
        } catch (\Exception $e) {
            Log::error('File upload failed', ['error' => $e->getMessage()]);
            return null;
        }
    
        return $fileName;
    }
    
    public function reservation(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $month = date('m');
        $day = date('d');
        $prices = Price::join('categories','categories.id','=','prices.category_id')->selectRaw('*, prices.id')->get();
        $companions = Companion::where('status', 1)->get();
        // クエリパラメーターから selected_date を取得、なければ今日の日付を使用
        $selected_date = $request->get('selected_date', date('Y-m-d'));
    
        return view('page.reservation', compact('header', 'footer', 'month', 'day', 'prices', 'companions', 'selected_date'));
    }


    public function reservation_save(Request $request)
    {
        // リクエストデータをデバッグ
        // Log::info の代わりにdump関数を使う
        // dump('予約保存処理開始', $request->all());
        
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'required|email',
            'mail_confirmation' => 'required|same:mail',
            'tel' => 'required',
            'lady1' => 'required',
            'lady2' => 'nullable',
            'lady3' => 'nullable',
            'first_reservation_month' => 'required|numeric',  // integerではなくnumericに変更
            'first_reservation_date' => 'required|numeric',
            'first_reservation_hour' => 'required|numeric',
            'first_reservation_minute' => 'required|numeric',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        try {
            $currentYear = date('Y');
            
            // 第一候補
            $firstReservationDate = sprintf(
                '%04d-%02d-%02d %02d:%02d:00',
                $currentYear,
                $request->first_reservation_month,
                $request->first_reservation_date,
                $request->first_reservation_hour,
                $request->first_reservation_minute
            );
            
            // 第二候補
            $secondReservationDate = null;
            if ($request->second_reservation_month && $request->second_reservation_date && 
                $request->second_reservation_hour && $request->second_reservation_minute) {
                $secondReservationDate = sprintf(
                    '%04d-%02d-%02d %02d:%02d:00',
                    $currentYear,
                    $request->second_reservation_month,
                    $request->second_reservation_date,
                    $request->second_reservation_hour,
                    $request->second_reservation_minute
                );
            }
            
            // 第三候補
            $thirdReservationDate = null;
            if ($request->third_reservation_month && $request->third_reservation_date && 
                $request->third_reservation_hour && $request->third_reservation_minute) {
                $thirdReservationDate = sprintf(
                    '%04d-%02d-%02d %02d:%02d:00',
                    $currentYear,
                    $request->third_reservation_month,
                    $request->third_reservation_date,
                    $request->third_reservation_hour,
                    $request->third_reservation_minute
                );
            }
            
            // トランザクションを開始
            \Illuminate\Support\Facades\DB::beginTransaction();
            
            try {
                // 直接クエリビルダーを使用してデータを挿入
                $id = \Illuminate\Support\Facades\DB::table('web_reservations')->insertGetId([
                    'name' => $request->name,
                    'mail' => $request->mail,
                    'tel' => $request->tel,
                    'lineid' => $request->lineid ?? '',
                    'lady1' => $request->lady1,
                    'lady2' => $request->lady2 ?? '', // 空の場合は空文字列を設定
                    'lady3' => $request->lady3 ?? '', // 空の場合は空文字列を設定
                    'date1' => $firstReservationDate,
                    'date2' => $secondReservationDate,
                    'date3' => $thirdReservationDate,
                    'cource' => $request->cource ?? '',
                    'place' => $request->place ?? '',
                    'pay' => $request->pay ?? '',
                    'contact' => $request->contact ?? '',
                    'cmnt' => $request->cmnt ?? '',
                    'compatible' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                
                // トランザクションをコミット
                \Illuminate\Support\Facades\DB::commit();
                
                // 予約IDを取得
                $reservation = \App\Models\WebReservation::find($id);
                
                // メール送信
                if (class_exists('\App\Mail\ReservationNotification')) {
                    \Illuminate\Support\Facades\Mail::to('info.clubfirenze2021@gmail.com')
                        ->send(new \App\Mail\ReservationNotification($reservation));
                }
                
                return redirect()
                    ->route('page.reservation', ['selected_date' => $firstReservationDate])
                    ->with('success', 'ご予約ありがとうございます。内容を確認次第、ご連絡いたします。');
            } catch (\Exception $e) {
                // トランザクションをロールバック
                \Illuminate\Support\Facades\DB::rollBack();
                
                // エラーメッセージをエラーログに記録
                // Log::error('予約保存エラー', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
                
                return redirect()
                    ->back()
                    ->with('error', 'システムエラーが発生しました。お手数ですがお電話でのご予約をお願いいたします。')
                    ->withInput();
            }
        } catch (\Exception $e) {
            // エラーメッセージをエラーログに記録
            // Log::error('予約処理全体エラー', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            
            return redirect()
                ->back()
                ->with('error', 'システムエラーが発生しました。お手数ですがお電話でのご予約をお願いいたします。')
                ->withInput();
        }
    }


    public function movie(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $movie = Pages::where(['name'=>'movie'])->first();
        $companions = Companion::with(['home_image', 'category'])->where(['status'=>1])->orderBy('id', 'DESC')->take(6)->get();
        return view('page.movie', compact('header','footer','movie','companions'));
    }

    public function ranking(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $ranking = Pages::where(['name'=>'ranking'])->first();

        $all_records = array();
        $categories = Category::where(['status'=>1])->get();;
        foreach($categories as $category){
            $all_records[$category->name] = Companion::with(['category','home_image'])->where([ 'category_id'=>$category->id ])->where(['status' => 1])->orderBy('position')->take(6)->get();
        }

        return view('page.ranking', compact('header','footer','ranking','all_records'));
    }

    public function attendance_notices(Request $request)
    {
        if(!empty($request->castsyukkinmail_add)){
            AttendanceNotice::updateOrInsert(['email' => $request->mail_addr],['name'=>$request->name, 'mail_actors'=>$request->mail_actors, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
            return redirect()->back()->with('success', __('Save Changes'));
        }else{
            AttendanceNotice::where(['email' => $request->mail_addr])->delete();
            return redirect()->back()->with('success', __('Successfully deleted'));
        }
    }

    public function summary(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $summary = Pages::where(['name'=>'summary'])->first();
        return view('page.summary', compact('header','footer', 'summary'));
    }

    public function entry(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $entry = Pages::where(['name'=>'entry'])->first();
        $month=date('m');
        $day = date('d');
        return view('page.entry', compact('header','footer', 'entry', 'month', 'day'));
    }


public function entry_save(Request $request)
    {
        $request->validate([
            'rec_name' => 'required',
            'rec_mail' => 'required',
            'rec_tel' => 'required',
            'rec_require' => 'required',
            'rec_age' => 'required'
        ]);

        $imageName = "";
        if($request->hasfile('rec_photo')){
            $request->validate(['rec_photo' => 'required|image|max:10240']);
            $image = $request->file('rec_photo');
            $ext = $image->getClientOriginalExtension();
            $imageName = rand('1111','9999').time().'.'.$ext;
            Storage::disk('public')->put('images/'.$imageName, file_get_contents($image), 'public');
        }

        $interview = Interview::updateOrCreate([
            'mail' => $request->rec_mail,
        ],[
            'name' => $request->rec_name,
            'tel'  => $request->rec_tel,
            'line_id' => $request->rec_lineid,
            'inquiry' => $request->rec_require,
            'age' => $request->rec_age,
            'height' => $request->rec_height,
            'weight' => $request->rec_weight,
            'bust' => $request->rec_bust,
            'tattoo' => $request->tattoo,
            'interview_date'=> date('Y').'-'.$request->rec_interview1_m.'-'.$request->rec_interview1_d.' '.$request->rec_interview1_h.':'.$request->rec_interview1_min,
            'experience' => $request->tattoo,
            'appealing_points' => '',
            'other_message' => $request->rec_cmnt,
            'photo' => $imageName,
            'compatible' => 0,
            'status' => 1
        ]);

       dispatch(new RecruitmentToApplicantJob(['interview'=>$interview]));
       dispatch(new RecruitmentToStoreJob(['interview'=>$interview]));


        return redirect()->back()->with('success', __('応募が送信されました'));


    }

    public function terms(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.web.reservation'));
        }
        return view('user.terms');
    }

}