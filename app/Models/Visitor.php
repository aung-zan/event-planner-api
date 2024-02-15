<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors';

    protected $primaryKey = 'visitor_id';

    protected $fillable = ['visitor_code', 'name', 'email', 'password'];

    protected $hidden = ['password'];

    public function exhibitions(): BelongsToMany
    {
        return $this->belongsToMany(Exhibition::class, 'exhibition_visitor', 'visitor_id', 'exhibition_id');
    }
}
