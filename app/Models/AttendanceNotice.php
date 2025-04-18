<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceNotice extends Model
{
    use HasFactory;

    protected $table = 'attendance_notices';

    protected $fillable = [
        'name',
        'email',
        'mail_actors'
    ];

}
