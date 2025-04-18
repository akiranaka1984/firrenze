<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pages;
use App\Models\Companion;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Price;
use App\Models\User;
use App\Models\TelegramCred;

use Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.reception.list'));
        }

        $wbr = !empty($request->wbr) ? 1 : 0;
        $telegramCred = TelegramCred::where(['id'=>1])->first();
        return view('user.login', ['telegramCred'=>$telegramCred, 'wbr'=>$wbr]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'role'=>'user', 'status' => 1])) {
                if($request->wbr == 1){
                    return redirect(route('user.web.reservation'));
                }else{
                    return redirect(route('user.reception.list'));
                }
            }
        }
        return redirect()->back()->with('error', __('Login details are not valid!'));
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('user.login');
    }

}
