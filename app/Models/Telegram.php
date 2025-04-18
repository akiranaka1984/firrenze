<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telegram extends Model
{
    use HasFactory;

    protected $table = 'telegrams';

    protected $fillable = [
        'template_name',
        'content'
    ];
}
