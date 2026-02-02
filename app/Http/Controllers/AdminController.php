<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use App\Models\Contact;
use App\Models\News;
use App\Models\WebReservation;
use App\Models\Interview;
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
        $companionCount = Companion::where('status', 1)->count();
        $reservationCount = WebReservation::where('compatible', 0)->count();
        $interviewCount = Interview::where('compatible', 0)->count();
        $contactCount = Contact::count();

        return view('admin.dashboard', compact(
            'companionCount',
            'reservationCount',
            'interviewCount',
            'contactCount'
        ));
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
