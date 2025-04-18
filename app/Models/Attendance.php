<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'companion_id',
        'date',
        'start_time',
        'end_time',
        'undetermined_hours',
        'hidden_hours',
        'without_end_time_display',
        'message',
        'position'
    ];

    public function companion(){
    	return $this->hasOne('App\Models\Companion','id','companion_id')->with(['category', 'home_image']);
    }

}
