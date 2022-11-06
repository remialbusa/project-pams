<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Subject extends Model
{
   use UUID;
   use HasFactory;
   
   public function student(){
        return $this->belongsTo('App\Models\Student');
   }
}
