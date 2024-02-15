<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exhibition extends Model
{
    use HasFactory;

    protected $table = 'exhibitions';

    protected $primaryKey = 'exhibition_id';

    protected $fillable = ['name', 'place', 'status', 'date_from', 'date_to', 'start', 'end'];

    protected $casts = [
        'created_at' => 'datetime: Y-m-d H:i:s',
        'updated_at' => 'datetime: Y-m-d H:i:s',
    ];

    protected function eventStart(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => date('Y-m-d H:i', strtotime($value))
        );
    }

    protected function eventEnd(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => date('Y-m-d H:i', strtotime($value))
        );
    }

    /**
     * event status
     *
     * 0 => pending,
     * 1 => ongoing,
     * 2 => complete,
     */
    private $eventStatus = ['pending', 'ongoing', 'complete'];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => $this->eventStatus[$value]
        );
    }

    public function visitors(): BelongsToMany
    {
        return $this->belongsToMany(Visitor::class, 'exhibition_visitor', 'exhibition_id', 'visitor_id');
    }
}
