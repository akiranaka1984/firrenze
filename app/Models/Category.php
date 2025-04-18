<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'position',
        'status'
    ];

    public function companions(){
    	return $this->hasMany('App\Models\Companion','category_id','id');
    }

    public function prices(){
    	return $this->hasMany('App\Models\Price','category_id','id');
    }

}
