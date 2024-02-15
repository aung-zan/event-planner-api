<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'staffs';

    protected $primaryKey = 'staff_id';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];
}
