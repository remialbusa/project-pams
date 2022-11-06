<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Student extends Model
{
    use UUID;
    use HasFactory;

    function subject(){
        return $this->hasMany('App\Models\Subject');
    }
}
