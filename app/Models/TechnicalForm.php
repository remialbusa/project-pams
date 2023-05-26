<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class TechnicalForm extends Model
{
    use UUID;
    use HasFactory;

    protected $table = 'technical_form';
}
