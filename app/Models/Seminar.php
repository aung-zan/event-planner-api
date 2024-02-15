<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $table = 'seminars';

    protected $primaryKey = 'seminar_id';

    protected $fillable = ['name', 'type', 'place', 'start', 'end'];
}
