<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Mark extends Model
{
    use HasFactory;

    protected $table = 'registros';
    protected $fillable = ['horario', 'entrada', 'user_id'];
}
