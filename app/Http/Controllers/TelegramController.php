<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Jobs\SentToTelegramJob;

use App\Models\Telegram;
use App\Models\TelegramCred;

class TelegramController extends Controller
{
    public function index(Request $request)
    {
        $template_data = Telegram::all();
        return view('admin.telegram.list',compact('template_data'));
    }

    public function create(Request $request)
    {
        return view('admin.telegram.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
        ]);

        Telegram::create([
            'template_name' => $request->post_title,
            'content' => $request->post_content
        ]);
        
        return redirect()->route('admin.telegram.list')->with('success', __('Save Changes'));
    }

    public function edit(Request $request)
    {
        $data = Telegram::where([ 'id'=>$request->id ])->first();
        return view('admin.telegram.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'post_title' => 'required',
            'post_content' => 'required',
        ]);

        Telegram::where([ 'id'=>$request->id ])->update([
            'template_name' => $request->post_title,
            'content' => $request->post_content
        ]);

        return redirect()->route('admin.telegram.list')->with('success', __('Save Changes'));
  
    }

    public function delete(Request $request)
    {
        Telegram::where(['id'=>$request->id])->delete();
        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function sent(Request $request)
    {
        dispatch(new SentToTelegramJob(['telegram_id'=>$request->id]));
        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function telegram_cred(Request $request)
    {
        $telegramCred = TelegramCred::where(['id'=>1])->first();
        return view('admin.telegram_cred.list', compact('telegramCred'));
    }

    public function telegram_save(Request $request)
    {
        TelegramCred::updateOrCreate([
            'id'=>1
        ],[
            'botname'=>$request->frm_name,
            'token'=>$request->frm_token,
            'brodcast_id'=>$request->frm_brod_id
        ]);

        return redirect()->back()->with('success', __('Save Changes'));
    }
    

}
