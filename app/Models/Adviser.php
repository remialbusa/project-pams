<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Adviser extends Model
{
    use HasFactory;

    protected $table = 'advisers';
    public static function getAllAdvisers()
    {
        $result = DB::table('advisers')
        ->select('id','program','title','first_name','middle_name','last_name')
        ->get()
        ->toArray();
        return $result;
    }
}
