<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use Illuminate\Support\Facades\DB;

class Defense extends Model
{
    use UUID;
    use HasFactory;

    protected $table = 'defense';

}
