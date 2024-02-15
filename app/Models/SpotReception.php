<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotReception extends Model
{
    use HasFactory;

    protected $table = 'spot_receptions';

    protected $primaryKey = 'spot_reception_id';

    protected $fillable = ['spot_id', 'visitor_id', 'admission_at', 'created_by'];
}
