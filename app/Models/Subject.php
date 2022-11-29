<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subject extends Model
{
   use HasFactory;

   protected $fillable = [
      'code','program','subject','unit','period'
   ];

   public static function getAllSubjects()
    {
        $result = DB::table('subjects')
        ->select('id','code','program','subject','unit','period')
        ->get()
        ->toArray();
        return $result;
    }
}
