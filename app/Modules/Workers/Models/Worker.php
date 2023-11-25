<?php

namespace App\Modules\Workers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
      'email', 'imie', 'nazwisko', 'telefon_1', 'telefon_2', 'dieta', 'firma'
    ];
}
