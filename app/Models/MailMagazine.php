<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailMagazine extends Model
{
    use HasFactory;

    protected $table = 'mail_magazines';

    protected $fillable = [
        'name',
        'email'
    ];
}
