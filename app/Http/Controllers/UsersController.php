<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Price;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->q)){
            $search_q = $request->q;
            $users = User::where(['role'=>'user','status'=>1])->where(function ($query) use ($search_q){
                $query->where('name', 'like', '%'.$search_q.'%')
                    ->orWhere('email', 'like', '%'.$search_q.'%')
                    ->orWhere('tel', 'like', '%'.$search_q.'%');
            })->orderBy('id', 'DESC')->get();
            return view('admin.users.list', compact('users', 'search_q'));
        }else{
            $search_q = '';
            $users = User::where(['role'=>'user', 'status'=>1])->orderBy('id', 'DESC')->get();
            return view('admin.users.list', compact('users', 'search_q'));
        }
    }

    public function add(Request $request)
    {
        $prices = Price::join('categories','categories.id','=','prices.category_id')->selectRaw('*, prices.id')->get();
        return view('admin.users.add', compact('prices'));
    }

    public function save(Request $request)
    {
        $request->validate([ 
            'frm_name' => 'required', 
            'frm_email' => 'required', 
            'frm_password' => 'required', 
            'frm_tel' => 'required'
        ]);

        User::updateOrCreate([
            'tel'=>$request->frm_tel
        ],[
            'username'=>$request->frm_name.rand('1111','9999'),
            'name'=>$request->frm_name,
            'email'=>$request->frm_email,
            'password'=> bcrypt($request->frm_password),
            'lineid'=>$request->frm_line_id,
            'cource'=>$request->frm_cource,
            'pay'=>$request->frm_payment_method,
            'cmnt'=>$request->frm_cmnt,
            'city'=>'jp',
            'role'=>'user'
        ]);

        return redirect()->route('admin.users.list')->with('success', __('Save Changes'));
    }

    public function edit(Request $request)
    {
        $user = User::where(['id'=>$request->id])->first();
        $prices = Price::join('categories','categories.id','=','prices.category_id')->selectRaw('*, prices.id')->get();
        return view('admin.users.edit', compact('prices', 'user'));
    }

    public function update(Request $request)
    {
        $request->validate([ 
            'frm_name' => 'required', 
            'frm_email' => 'required', 
            'frm_tel' => 'required'
        ]);

        $input = [
            'tel'=>$request->frm_tel,
            'name'=>$request->frm_name,
            'email'=>$request->frm_email,
            'lineid'=>$request->frm_line_id,
            'cource'=>$request->frm_cource,
            'pay'=>$request->frm_payment_method,
            'cmnt'=>$request->frm_cmnt
        ];

        if(!empty($request->frm_password)){
            $input['password'] = bcrypt($request->frm_password);
        }

        User::where([ 'id'=>$request->id ])->update($input);
        return redirect()->route('admin.users.list')->with('success', __('Save Changes'));
    }

    public function delete(Request $request)
    {
        User::where([ 'id'=>$request->id ])->update(['status'=>0]);
        return redirect()->route('admin.users.list')->with('success', __('Save Changes'));
    }

}
