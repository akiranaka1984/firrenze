<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;


class PageController extends Controller
{
    public function index(Request $request)
    {
        $page_name= !empty($request->page) ? $request->page : '';
        $text_data1 = "";
        $text_data2 = "";
        $text_data3 = "";
        if(!empty($request->page)){
            $pages = Pages::where(['name' => $request->page])->first();
            if($pages != null){
                $text_data1 = $pages->text_data1;
                $text_data2 = $pages->text_data2;
                $text_data3 = $pages->text_data3;
            }
        }   
        return view('admin.page.list', compact('page_name','text_data1', 'text_data2', 'text_data3'));
    }

    public function save(Request $request)
    {
        Pages::updateOrCreate(['name' => $request->page],
        [
            'text_data1' => $request->text_data1,
            'text_data2' => $request->text_data2,
            'text_data3' => $request->text_data3
        ]);

        return redirect()->route('admin.page.list', [ 'page' => $request->page ]);
    }

}
