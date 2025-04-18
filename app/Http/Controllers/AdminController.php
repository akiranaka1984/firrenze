<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {}

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function contact(Request $request)
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact.list', compact('contacts'));
    }

    public function contact_delete(Request $request)
    {
        Contact::where(['id'=>$request->id])->delete();
        return redirect()->back()->with('success', __('Save Changes'));
    }
}
