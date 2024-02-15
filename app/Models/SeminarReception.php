<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarReception extends Model
{
    use HasFactory;

    protected $table = 'seminar_receptions';

    protected $primaryKey = 'seminar_reception_id';

    protected $fillable = ['seminar_id', 'visitor_id', 'admission_at', 'created_by'];
}
