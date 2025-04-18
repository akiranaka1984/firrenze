<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Session;

use App\Models\User;

use App\Jobs\ForgotPasswordJob;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::user() != null){
            if(Auth::user()->status == 1){
                if(Auth::user()->isAdmin()){
                    return redirect(route('admin.dashbord'));
                } 
            }
        }

        return view('auth.login');   
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // まず、基本的な認証を試みます。
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // ユーザーが管理者であり、かつアカウントが有効な場合にのみログインを許可します。
            if ($user->role === 'admin' && $user->status == 1) {
                return redirect(route('admin.dashbord'));
            }
    
            // 管理者でないか、アカウントが無効な場合はログアウトさせます。
            Auth::logout();
            return redirect()->back()->with('error', __('Your account has been temporarily suspended!'));
        }
        
        // 認証が失敗した場合
        return redirect()->back()->with('error', __('Login details are not valid!'));
    }

    public function forgotpassword()
    {
        return view('auth.forgot_password');   
    }

    public function forgotpasswordSave(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $user = User::where(['email' => $request->email, 'role'=>'admin'])->first();
        if($user != null){
            if(empty($user->email_verify_token)){
                $user->email_verify_token = sha1(mt_rand(1, 90000) . 'SALT');
                $user->update();
            }
            
            dispatch(new ForgotPasswordJob(['user'=>$user]));
            return redirect()->route('admin.login')->with('success', __('Please check your mail to reset the password. Please make sure you check your spam filter.!'));
        }
        return redirect()->back()->with('error', __('The email is not associated with a any user account.'));
    }

    public function resetpassword($token){
        $user = User::where(['email_verify_token' => $token])->first();
        if ($user != null) {
            return view('auth.reset_password')->with(['success'=> __('Please Reset Password.!'),'id'=>$user->id, 'email'=>$user->email]);
        }
        return redirect()->route('forgot_password')->with('error', __('Request not found in worldbrige system'));
    }

    public function resetpasswordSave(Request $request){
        $request->validate([
            'id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        
        $user = User::where(['id' => $request->id, 'email' => $request->email])->first();
        if ($user == null) {
            return redirect()->back()->with('error', __('Something went to wrong.'));
        }

        if($request->password != $request->confirm_password){
            return redirect()->back()->with(['error'=> __('Password and Confirm password does not match!'),'id'=>$user->id, 'email'=>$user->email]);
        }

        $user->email_verify_token = null;
        $user->email_verify_status = 1;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.login')->with('success', __('Your account password successfully reset!'));
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('admin.login');
    }
    
}
