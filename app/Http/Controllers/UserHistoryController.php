<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Price;

class UserHistoryController extends Controller
{
    public function index(Request $request)
    {}

    public function dashboard(Request $request)
    {
        return view('user.dashboard');
    }


}
