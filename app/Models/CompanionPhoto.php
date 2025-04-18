<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanionPhoto extends Model
{
    use HasFactory;

    protected $table = 'companion_photos';

    protected $fillable = [
        'companion_id',
        'photo_setting_id',
        'title',
        'photo',
        'status'
    ];

    public function photo_size_setting(){
    	return $this->hasOne('App\Models\PhotoSizeSetting','id','photo_setting_id')->with('photo_category');
    }
    
}
