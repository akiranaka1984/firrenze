<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoSizeSetting extends Model
{
    use HasFactory;
    
    protected $table = 'photo_size_settings';

    protected $fillable = [
        'name',
        'kana',
        'category_id',
        'hpx',
        'vpx',
        'prefix',
        'status'
    ];

    public function photo_category(){
    	return $this->hasOne('App\Models\PhotoCategory','id','category_id');
    }

}
