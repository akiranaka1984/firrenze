<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;

    protected $table = 'companions';

    protected $fillable = [
        'name',
        'kana',
        'age',
        'height',
        'bust',
        'cup',
        'waist',
        'hip',
        'rookie',
        'hobby',
        'sale_point',
        'font_color',
        'message',
        'entry_date',
        'category_id',
        'previous_position',
        'celebrities_who_look_alike',
        'position',
        'status'
    ];

    public function category(){
    	return $this->hasOne('App\Models\Category','id','category_id')->with(['prices']);
    }

    public function home_image(){
    	return $this->hasOne('App\Models\CompanionPhoto','companion_id','id')->where(['status' => 1, 'photo_setting_id'=>1]);
    }

    public function all_images(){
    	return $this->hasMany('App\Models\CompanionPhoto','companion_id','id');
    }

    public function today_attendances(){
        $today = date('Y-m-d');
        return $this->hasOne('App\Models\Attendance','companion_id','id')->where('date','=',$today);
    }
    public function attendances(){
        $today = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime($today. ' + 7 days'));
        return $this->hasMany('App\Models\Attendance','companion_id','id')
                    ->where('date','>=', $today)
                    ->where('date','<=', $endDate)
                    ->orderBy('updated_at', 'desc')
                    ->orderBy('id', 'desc');
    }    
}
