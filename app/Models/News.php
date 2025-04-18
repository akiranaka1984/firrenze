<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'text',
        'position',
        'status',
        'slug',
        'companion_id'  // この行を追加
    ];
    public function companion(){
        return $this->hasOne('App\Models\Companion','id','companion_id')->with(['category', 'home_image']);
    }

}

