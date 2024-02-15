<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhibitionVisitor extends Model
{
    use HasFactory;

    protected $table = 'exhibition_visitor';

    protected $primaryKey = 'exhibition_visitor_id';
}
