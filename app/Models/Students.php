<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table ='students';
    protected $fallible= [
        'first_name',
        'last_name',
        'email',
        'cne',
        'formation',
        'user_id',
    ];
}
