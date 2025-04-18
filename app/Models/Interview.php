<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $table = 'interviews';

    protected $fillable = [
        'name',
        'mail',
        'tel',
        'line_id',
        'inquiry',
        'age',
        'height',
        'weight',
        'bust',
        'tattoo',
        'interview_date',
        'experience',
        'appealing_points',
        'other_message',
        'photo',
        'compatible',
        'status'
    ];

}
