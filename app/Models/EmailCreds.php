<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailCreds extends Model
{
    use HasFactory;

    protected $table = 'email_creds';

    protected $fillable = [
        'name',         
        'address',     
        'driver',      
        'host',        
        'port',        
        'encryption',  
        'username',    
        'password'     
    ];


}
