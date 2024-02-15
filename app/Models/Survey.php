<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    protected $primaryKey = 'survey_id';

    protected $fillable = ['name', 'status', 'start', 'end'];
}
