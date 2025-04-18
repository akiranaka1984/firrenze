<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Price;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        return view('admin.category.list', compact('categories'));
    }

    public function save(Request $request)
    {
        $request->validate([ 'name' => 'required' ]);

        if(empty($request->id)){
            $count = Category::max('position');
            Category::create(['name'=>$request->name, 'position'=>($count+1)]);
            return redirect()->back()->with('success', __('Save Changes'));
        }else{
            Category::where(['id'=>$request->id])->update(['name'=>$request->name]);
            return redirect()->back()->with('success', __('Save Changes'));
        }
        
    }

    public function delete(Request $request)
    {
        Category::where(['id'=>$request->id])->update(['status'=>0, 'position'=>0]);
        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function position(Request $request)
    {

        Category::where('id','>',0)->update(['position'=>0]);
        foreach($request->data as $key => $data){
            Category::where(['id'=>$key])->update(['position'=>$data]);
        }

        return response()->json(['status' => 1, 'message' => 'success']);
    }
    
    public function price_list(Request $request)
    {
        $category_id = $request->id;
        $prices = Price::where(['category_id' => $category_id])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        return view('admin.category.price', compact('category_id', 'prices'));
    }

    public function price_save(Request $request)
    {
        Price::create([
            'category_id' => $request->id,
            'time_interval' => $request->time_interval,
            'start_price' => $request->start_price,
            'end_price' => $request->end_price,
            'position' => 0
        ]);

        return redirect()->back()->with('success', __('Save Changes'));
    }
    
    public function price_delete(Request $request)
    {
        Price::where(['id'=>$request->id])->delete();
        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function price_position(Request $request)
    {   
        Price::where('id','>',0)->update(['position'=>0]);
        foreach($request->data as $key => $data){
            Price::where(['id'=>$key])->update(['position'=>$data]);
        }

        return response()->json(['status' => 1, 'message' => 'success']);
    }
}
