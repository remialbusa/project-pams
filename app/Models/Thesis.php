<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Thesis extends Model
{
    use UUID;
    use HasFactory;

    public $table = 'thesis';
    protected $fillable = [
        'title',
        'author'
    ];
}
